<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Participants;
use App\Threads;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChatController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('chat.chat');
    }

    /**
     * Fetch all chat messages from the database.
     *
     * @return array \App\Chat
     */
    public function fetchAllMessages(Request $request)
    {

        if ($request->ischatType == "group") {
            $chat = Chat::with('user')->select('*', 'chats.id as ms_id', 'chats.created_at as created_at_chat')
                ->leftJoin('users', 'users.id', '=', 'chats.to_id')
                ->where('threads_id', $request->chat_group_id)
                ->orderBy('chats.id', 'asc')
                ->get();

        } else {
            $chat = Chat::with('user')->select('*', 'chats.id as ms_id', 'chats.created_at as created_at_chat')
                ->leftJoin('users', 'users.id', '=', 'chats.to_id')
                ->whereIn('user_id', [Auth::user()->id, $request->get('to_id')])
                ->whereIn('to_id', [Auth::user()->id, $request->get('to_id')])
                ->orderBy('chats.id', 'asc')
                ->get();
        }

        return $chat;

    }
    public function SeenMessages(Request $request)
    {
        $chat = Chat::with('user')->select('*', 'chats.id as ms_id')
            ->leftJoin('users', 'users.id', '=', 'chats.to_id')
            ->where('user_id', $request->get('to_id'))
            ->where('to_id', Auth::user()->id)
            ->get();

        foreach ($chat as $row) {
            $update = Chat::find($row->ms_id);
            $update->seen = true;
            $update->save();
        }

    }

    public function fetcFile(Request $request)
    {
        $type = $request->get('type');

        if ($request->ischatType == "group") {
            $chat = Chat::with('user')->select('*', 'chats.id as ms_id', 'chats.created_at as created_at_chat')
                ->leftJoin('users', 'users.id', '=', 'chats.to_id')
                ->where('threads_id', $request->chat_group_id)
                ->where('type', $type)
                ->orderBy('chats.id', 'asc')
                ->get();
        } else {
            $chat = Chat::with('user')->select('*', 'chats.id as ms_id', 'chats.created_at as created_at_chat')
                ->leftJoin('users', 'users.id', '=', 'chats.to_id')
                ->whereIn('user_id', [Auth::user()->id, $request->get('to_id')])
                ->whereIn('to_id', [Auth::user()->id, $request->get('to_id')])
                ->where('type', $type)
                ->orderBy('chats.id', 'asc')
                ->get();
        }
        return response()->json($chat);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function sendMessage(Request $request)
    {

        if ($request->message != '') {

            if ($request->ischatType == "group") {
                $chat = auth()->user()->messages()->create([
                    'message' => $request->message,
                    'user_id' => Auth::user()->id,
                    'type' => 'message',
                    'seen' => false,
                    'threads_id' => $request->chat_group_id,
                ]);
            } else {
                $chat = auth()->user()->messages()->create([
                    'message' => $request->message,
                    'user_id' => Auth::user()->id,
                    'to_id' => $request->get('to_id'),
                    'type' => 'message',
                    'seen' => false,
                ]);
            }

            // broadcast(new ChatSent($chat->load('user')))->toOthers();

            return ['status' => 'success'];

        }
    }

    public function MessageUploadFile(Request $request)
    {

        $name_file = time() . '.' . $request->file->extension();
        $request->file->move(public_path('upload_file/'), $name_file);

        $imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief', 'jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];

        $explodeImage = explode('.', 'upload_file/' . $name_file);
        $extension = end($explodeImage);

        if (in_array($extension, $imageExtensions)) {
            $type = 'picture';
        } else {
            $type = 'file';
        }

        if ($request->ischatType == "group") {
            $chat = auth()->user()->messages()->create([
                'message' => $name_file,
                'user_id' => Auth::user()->id,
                'type' => $type,
                'seen' => false,
                'threads_id' => $request->chat_group_id,
            ]);
        } else {
            $chat = auth()->user()->messages()->create([
                'message' => $name_file,
                'user_id' => Auth::user()->id,
                'to_id' => $request->get('to_id'),
                'type' => $type,
                'seen' => false,
            ]);
        }
        // $chat = auth()->user()->messages()->create([
        //     'message' => $name_file,
        //     'user_id' => Auth::user()->id,
        //     'to_id' => $request->get('to_id'),
        //     'type' => $type,
        //     'seen' => false,
        // ]);

        // broadcast(new ChatSent($chat->load('user')))->toOthers();

        return response()->json($chat);
    }

    public function getUser(Request $request)
    {

        $user = User::select('*', 'id as last', 'id as lastupdate', 'id as seen_ms')->whereNotIn('id', [Auth::user()->id])
            ->get()->toArray();


        $isread = 0;

        foreach ($user as $index => $row) {
            $chat = Chat::select('*')->whereIn('user_id', [Auth::user()->id, $user[$index]['id']])
                ->whereIn('to_id', [Auth::user()->id, $user[$index]['id']])->orderBy('id', 'desc')->first();

            $seen = Chat::with('user')
                ->where('user_id', $user[$index]['id'])
                ->where('to_id', Auth::user()->id)
                ->where('seen', false)
                ->count();

            if ($chat == null) {
                $user[$index]['last'] = '';
                $user[$index]['lastupdate'] = '';
                // $user[$index]['lastupdate'] = $user[$index]['created_at'];

            } else {
                $user[$index]['last'] = $chat->message;
                $user[$index]['lastupdate'] = $chat->created_at;

            }
            $user[$index]['seen_ms'] = $seen;

            if ($seen != 0) {
                $isread += 1;
            }
        }

        $columns = array_column($user, 'lastupdate');
        array_multisort($columns, SORT_DESC, $user);
        // return $user;

        return response()->json([$user, $isread]);

    }

    public function GetUserGroup(Request $request)
    {

        $user = User::select('*')->whereNotIn('id', [Auth::user()->id])
            ->get();

        return $user;

    }

    public function edit_profile(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->tel = $request->tel;
        $user->save();

        return response()->json($user);

    }
    public function edit_profile_picture(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if ($request->file != '') {
            $name = time() . '.' . $request->file->extension();
            $request->file->move(public_path('profile_upload/'), $name);
            $user->profile = $name;
        }

        $user->save();


        return response()->json($user);
    }

    public function reset_password(Request $request)
    {

        $msg = '';
        $user = User::find(Auth::user()->id);

        if (Hash::check($request->profile_current_password, $user->password)
        ) {

            if ($request->profile_new_password == $request->profile_verify_password) {
                $user->password = Hash::make($request->profile_new_password);
                $msg = 'เปลี่ยนรหัสผ่านสำเร็จ';
            } else {
                $msg = 'กรุณากรอกรหัสผ่านให้ตรงกัน';
            }

        } else {
            $msg = 'กรุณากรอกรหัสเดิมให้ถูกต้อง';
        }

        $user->save();

        return response()->json($msg);
    }
    public function delete_messages(Request $request)
    {
        $chat = Chat::find($request->get('ms_id'));
        if ($chat->type != 'message') {
            unlink('upload_file/' . $chat->message);

            // unlink($image_path);
        }

        $chat->delete();

    }

    public function created_group(Request $request)
    {
        $threads = new Threads();
        $threads->subject = $request->group_name;
        $threads->about = $request->group_about;
        $threads->created_by = Auth::user()->id;

        if ($request->group_profile != '') {
            $name = time() . '.' . $request->group_profile->extension();
            $request->group_profile->move(public_path('profile_upload/'), $name);
            $threads->threads_profile = $name;

        }
        $threads->save();

        $myArray = explode(',', $request->group_user);

        foreach ($myArray as $index => $row) {
            $participants = new Participants();
            $participants->threads_id = $threads->id;
            $participants->user_id = $myArray[$index];
            $participants->save();
        }

        $participants = new Participants();
        $participants->threads_id = $threads->id;
        $participants->user_id = Auth::user()->id;
        $participants->save();

        return response()->json($myArray[0]);

    }

    public function updatgroup(Request $request)
    {
        $threads = Threads::find($request->threads_id);
        $threads->subject = $request->update_chatgroup_subject;
        $threads->about = $request->update_chatgroup_about;
        $threads->save();
    }

    public function getChatGroup()
    {
        $threads = Threads::select('*', 'participants.threads_id', 'threads.id as threads_id', 'threads.id as lastms', 'threads.id as lastupdate', 'threads.created_at as threads_created_at')
            ->join('users', 'threads.created_by', '=', 'users.id')
            ->join('participants', 'threads.id', '=', 'participants.threads_id')
            ->where('participants.user_id', Auth::user()->id)
            ->get()->toArray();

        foreach ($threads as $index => $row) {
            $chat = Chat::select('*')
                ->where('threads_id', $threads[$index]['threads_id'])
                ->orderby('id', 'desc')
                ->first();
            if ($chat != '') {
                $threads[$index]['lastms'] = $chat;
                $threads[$index]['lastupdate'] = $chat->created_at;
            } else {
                $threads[$index]['lastms'] = '';
                $threads[$index]['lastupdate'] = $threads[$index]['threads_created_at'];
            }

        }

        $columns = array_column($threads, 'lastupdate');
        array_multisort($columns, SORT_DESC, $threads);

        return $threads;
    }

    public function getMemberChatGroup(Request $request)
    {


        $participants = Participants::select('*')
            ->join('users', 'participants.user_id', '=', 'users.id')
            ->where('threads_id', $request->chat_group_id)
        // ->whereNotIn('participants.user_id',[$check->created_by,Auth::user()->id])
            ->get();
        return $participants;
    }
    public function deleteMemberChatGroup(Request $request)
    {
        $participants = Participants::where('threads_id', $request->chat_group_id)->where('user_id', $request->member_id);

        $participants->delete();

    }
    public function addMemberChatGroup(Request $request)
    {

        $myArray = explode(',', $request->checkedAddUser_group);

        foreach ($myArray as $index => $row) {
            $participants = new Participants();
            $participants->threads_id = $request->threads_id;
            $participants->user_id = $myArray[$index];
            $participants->save();
        }

    }
    public function thisDataChatGroup(Request $request)
    {
        $threads = Threads::select('*', 'threads.id as threads_id')
            ->join('users', 'threads.created_by', '=', 'users.id')
            ->where('threads.id', $request->threads_id)
            ->first();

        return $threads;
    }
    public function get_user_not_in_chat_group(Request $request)
    {
        $participants = Participants::select('user_id')
            ->where('threads_id', $request->threads_id)
            ->get();
        $data = array();
        foreach ($participants as $row) {
            array_push($data, $row->user_id);
        }

        $user = User::select('*')->whereNotIn('id', $data)->get();
        return $user;
    }

    public function updatgroup_profile(Request $request)
    {
        $threads = Threads::find($request->threads_id);

        if ($request->file != '') {
            $name = time() . '.' . $request->file->extension();
            $request->file->move(public_path('profile_upload/'), $name);
            $threads->threads_profile = $name;
        }

        $threads->save();

        return response()->json($threads);
    }

}
