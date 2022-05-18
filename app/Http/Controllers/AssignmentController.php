<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Assignment_file;
use App\Assignment_sub;
use App\Assignment_subs_file;
use App\Assignment_User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function addassignment(Request $request)
    {

        $message = 'หมอบหมายงาน เรื่อง : ' . $request->assignment_name . ' รายละเอียด : ' . $request->assignment_about;

        if ($request->assignment_repeat != '') {
            $message .= ' กำหนดการนัดอัพเดทงาน : ' . $request->assignment_repeat;
        }

        if ($request->assignment_date != '1970-1-01 07:00:00') {
            $message .= ' กำหนดการส่งงาน : ' . $request->assignment_date;
        }
        $message .= ' หมอบหมายงานโดย : ' . Auth::user()->name;

        $chats = auth()->user()->messages()->create([
            'message' => $message,
            'user_id' => Auth::user()->id,
            'type' => 'message',
            'seen' => false,
            'threads_id' => $request->chat_group_id,
        ]);

        $assignment = new Assignment();
        $assignment->assignments_name = $request->assignment_name;
        $assignment->assignments_details = $request->assignment_about;
        $assignment->assignments_repeat = $request->assignment_repeat;

        if ($request->assignment_date != '1970-1-01 07:00:00') {
            $assignment->assignments_date = date('Y-m-d H:i:s', strtotime($request->assignment_date));
        } else {
            $assignment->assignments_date = null;
        }

        $assignment->assignments_chat_id = $chats->id;
        $assignment->assignments_chat_group_id = $request->chat_group_id;
        $assignment->assignments_by = Auth::user()->id;

        $assignment->save();

        if ($request->assignment_file_file != '') {
            foreach ($request->assignment_file_file as $row) {

                $assignment_files = new Assignment_file();
                $name = time() . '-' . $row->getClientOriginalName();
                $row->move(public_path('upload_file/'), $name);
                $assignment_files->assignments_id = $assignment->assignments_id;
                $assignment_files->assignments_file = $name;
                $assignment_files->assignments_file_name = $row->getClientOriginalName();
                $assignment_files->save();

            }
        }

        $myArray = explode(',', $request->user_assignment);

        foreach ($myArray as $index => $row) {
            $assignment_users = new Assignment_User();
            $assignment_users->assignments_id = $assignment->assignments_id;
            $assignment_users->assignment_users_by = $myArray[$index];
            $assignment_users->save();
        }

    }

    public function updatessignment(Request $request)
    {

        $assignment = Assignment::find($request->assignments_id);
        $assignment->assignments_name = $request->assignment_name;
        $assignment->assignments_details = $request->assignment_about;
        $assignment->assignments_repeat = $request->assignment_repeat;

        if ($request->assignment_date != '1970-1-01 07:00:00') {
            $assignment->assignments_date = date('Y-m-d H:i:s', strtotime($request->assignment_date));
        } else {
            $assignment->assignments_date = null;
        }

        $assignment->save();

        if ($request->assignment_file_file != '') {

            $detele_file = Assignment_file::where('assignments_id', $request->assignments_id)->delete();

            foreach ($request->assignment_file_file as $row) {

                $assignment_files = new Assignment_file();
                $name = time() . '-' . $row->getClientOriginalName();
                $row->move(public_path('upload_file/'), $name);
                $assignment_files->assignments_id = $assignment->assignments_id;
                $assignment_files->assignments_file = $name;
                $assignment_files->assignments_file_name = $row->getClientOriginalName();
                $assignment_files->save();

            }
        }

        $myArray = explode(',', $request->user_assignment);

        $detele_user = Assignment_User::where('assignments_id', $request->assignments_id)->whereNotIn('assignment_users_by', $myArray)->delete();
        $detele_user_not = Assignment_User::where('assignments_id', $request->assignments_id)->wherein('assignment_users_by', $myArray)->get();

        $check_user = Assignment_User::select('assignment_users_by')->where('assignments_id', $request->assignments_id)->get();

        $check_user_array = $myArray;

        $dataassignment_users_by = [];

        foreach ($check_user as $row) {
            $check_user_array[] = (string) $row->assignment_users_by;
            $dataassignment_users_by[] = (string) $row->assignment_users_by;
        }

        $result = array_diff($myArray, $dataassignment_users_by);

        $newresult = [];

        foreach ($result as $index => $row) {
            $newresult[] = (string) $result[$index];
        }

        foreach ($newresult as $index => $row) {

            $assignment_users = new Assignment_User();
            $assignment_users->assignments_id = $assignment->assignments_id;
            $assignment_users->assignment_users_by = $newresult[$index];
            $assignment_users->save();
        }
        return response()->json([$myArray, $dataassignment_users_by, $newresult, $request->assignment_date]);
    }

    public function assignment_get()
    {

        $assignment = Assignment::select('*', 'assignment_users.created_at as assignments_created_at', 'assignments_by as files', 'assignments_by as assignment_users',
            'assignments_by as sub', 'assignments_by as time_left')
            ->join('assignment_users', 'assignments.assignments_id', '=', 'assignment_users.assignments_id')
            ->join('users', 'assignments.assignments_by', '=', 'users.id')
            ->where('assignment_users.assignment_users_by', Auth::user()->id)
            ->where('assignments.assignments_status', 1)
            ->where('assignment_users.assignment_users_status', 1)
            ->orderBy('assignments.assignments_id', 'desc')
            ->get();

        foreach ($assignment as $index => $row) {
            $files = Assignment_file::select('*', 'assignments_file_name as name')->where('assignments_id', $assignment[$index]['assignments_id'])->get();
            $assignment[$index]['files'] = $files;

            $remaining_days = Carbon::now()->diffInDays(Carbon::parse($assignment[$index]->assignments_date));
            $assignment[$index]['time_left'] = $remaining_days;

        }

        $datauser = [];
        foreach ($assignment as $index => $row) {
            $assignment_users = Assignment_User::select('assignment_users_by')->where('assignments_id', $assignment[$index]['assignments_id'])->get();
            foreach ($assignment_users as $data) {
                $datauser[] = $data->assignment_users_by;
            }
            $assignment[$index]['assignment_users'] = $datauser;

            $datauser = [];
        }

        foreach ($assignment as $index => $row) {
            $sub = Assignment_sub::select('*', 'created_at as subfiles')
                ->where('assignment_users_id', $assignment[$index]['assignment_users_id'])->get();
            $assignment[$index]['sub'] = $sub;
            foreach ($sub as $indexx => $roww) {
                $subfiles = Assignment_subs_file::select('*')->where('assignment_subs_id', $sub[$indexx]->assignment_subs_id)->get();
                $sub[$indexx]['subfiles'] = $subfiles;
            }
        }

        return response()->json($assignment);
    }

    public function assignment_succus()
    {
        $assignment = Assignment::select('*', 'assignment_users.created_at as assignments_created_at', 'assignments_by as files', 'assignments_by as assignment_users',
            'assignments_by as sub')
            ->join('assignment_users', 'assignments.assignments_id', '=', 'assignment_users.assignments_id')
            ->join('users', 'assignments.assignments_by', '=', 'users.id')
            ->where('assignment_users.assignment_users_by', Auth::user()->id)
            ->where('assignments.assignments_status', 1)
            ->where('assignment_users.assignment_users_status', 2)
            ->orderBy('assignments.assignments_id', 'desc')
            ->get();

        foreach ($assignment as $index => $row) {
            $files = Assignment_file::select('*', 'assignments_file_name as name')->where('assignments_id', $assignment[$index]['assignments_id'])->get();
            $assignment[$index]['files'] = $files;
        }

        $datauser = [];
        foreach ($assignment as $index => $row) {
            $assignment_users = Assignment_User::select('assignment_users_by')->where('assignments_id', $assignment[$index]['assignments_id'])->get();
            foreach ($assignment_users as $data) {
                $datauser[] = $data->assignment_users_by;
            }
            $assignment[$index]['assignment_users'] = $datauser;

            $datauser = [];
        }

        foreach ($assignment as $index => $row) {
            $sub = Assignment_sub::select('*', 'created_at as subfiles')
                ->where('assignment_users_id', $assignment[$index]['assignment_users_id'])->get();
            $assignment[$index]['sub'] = $sub;
            foreach ($sub as $indexx => $roww) {
                $subfiles = Assignment_subs_file::select('*')->where('assignment_subs_id', $sub[$indexx]->assignment_subs_id)->get();
                $sub[$indexx]['subfiles'] = $subfiles;
            }
        }

        return response()->json($assignment);
    }

    public function assignment_to()
    {
        $assignment = Assignment::select('*', 'assignment_users.created_at as assignments_created_at', 'assignments_by as files', 'assignments_by as assignment_users',
            'assignments_by as sub', 'assignments_by as time_left', 'assignments_by as count_sub')
            ->join('assignment_users', 'assignments.assignments_id', '=', 'assignment_users.assignments_id')
            ->join('users', 'assignment_users.assignment_users_by', '=', 'users.id')
            ->where('assignments.assignments_by', Auth::user()->id)
            ->where('assignments.assignments_status', 1)
            ->where('assignment_users.assignment_users_status', 1)
            ->orderBy('assignments.assignments_id', 'desc')
            ->get();

        foreach ($assignment as $index => $row) {
            $files = Assignment_file::select('*', 'assignments_file_name as name')->where('assignments_id', $assignment[$index]['assignments_id'])->get();
            $assignment[$index]['files'] = $files;

            // $remaining_day = Carbon::now()->diffInDays(Carbon::parse($assignment[$index]->assignments_date));
            $remaining_day = Carbon::parse(Carbon::now())->diffInDays(Carbon::parse($assignment[$index]->assignments_date), false);
            $assignment[$index]['time_left'] = $remaining_day;
        }

        $datauser = [];
        foreach ($assignment as $index => $row) {
            $assignment_users = Assignment_User::select('assignment_users_by')->where('assignments_id', $assignment[$index]['assignments_id'])->get();
            foreach ($assignment_users as $data) {
                $datauser[] = $data->assignment_users_by;
            }
            $assignment[$index]['assignment_users'] = $datauser;

            $datauser = [];
        }

        foreach ($assignment as $index => $row) {
            $sub = Assignment_sub::select('*', 'created_at as subfiles')
                ->where('assignment_users_id', $assignment[$index]['assignment_users_id'])->get();
            $assignment[$index]['sub'] = $sub;
            foreach ($sub as $indexx => $roww) {
                $subfiles = Assignment_subs_file::select('*')->where('assignment_subs_id', $sub[$indexx]->assignment_subs_id)->get();
                $sub[$indexx]['subfiles'] = $subfiles;
            }
            $count_sub = count($sub);
            $assignment[$index]['count_sub'] = $count_sub;
        }

        return response()->json($assignment);

    }
    public function assignment_to_succus()
    {
        $assignment = Assignment::select('*', 'assignment_users.created_at as assignments_created_at', 'assignments_by as files', 'assignments_by as assignment_users',
            'assignments_by as sub','assignments_by as count_sub')
            ->join('assignment_users', 'assignments.assignments_id', '=', 'assignment_users.assignments_id')
            ->join('users', 'assignment_users.assignment_users_by', '=', 'users.id')

            ->where('assignment_users.assignment_users_status', 2)
            ->where('assignments.assignments_by',Auth::user()->id)
            ->orderBy('assignments.assignments_id', 'desc')
            ->get();

        foreach ($assignment as $index => $row) {
            $files = Assignment_file::select('*', 'assignments_file_name as name')->where('assignments_id', $assignment[$index]['assignments_id'])->get();
            $assignment[$index]['files'] = $files;
        }

        $datauser = [];
        foreach ($assignment as $index => $row) {
            $assignment_users = Assignment_User::select('assignment_users_by')->where('assignments_id', $assignment[$index]['assignments_id'])->get();
            foreach ($assignment_users as $data) {
                $datauser[] = $data->assignment_users_by;
            }
            $assignment[$index]['assignment_users'] = $datauser;

            $datauser = [];
        }

        foreach ($assignment as $index => $row) {
            $sub = Assignment_sub::select('*', 'created_at as subfiles')
                ->where('assignment_users_id', $assignment[$index]['assignment_users_id'])->get();
            $assignment[$index]['sub'] = $sub;
            foreach ($sub as $indexx => $roww) {
                $subfiles = Assignment_subs_file::select('*')->where('assignment_subs_id', $sub[$indexx]->assignment_subs_id)->get();
                $sub[$indexx]['subfiles'] = $subfiles;
            }
            $count_sub = count($sub);
            $assignment[$index]['count_sub'] = $count_sub;
        }

        return response()->json($assignment);

    }

    public function assignment_cancel(Request $request)
    {
        $assignment = Assignment::find($request->assignment_id);
        $assignment->assignments_status = 2;

        $assignment->save();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function assignment_this(Request $request)
    {
        $assignment = Assignment::select('*', 'assignments_by as files', )
            ->join('assignment_users', 'assignments.assignments_id', '=', 'assignment_users.assignments_id')
            ->where('assignment_users.assignment_users_id', $request->assignment_users_id)
            ->first();

        $files = Assignment_file::select('*', 'assignments_file_name as name')->where('assignments_id', $assignment['assignments_id'])->get();
        $assignment['files'] = $files;

        return response()->json($assignment);
    }

    public function assignment_subs(Request $request)
    {

        $checksend = $request->checksend;

        if ($checksend == 'send') {

            $Assignment_sub = new Assignment_sub();
            $Assignment_sub->assignment_subs_details = $request->assignment_details_send;
            $Assignment_sub->assignment_users_id = $request->assignment_users_id;
            $Assignment_sub->save();

            if ($request->assignment_file_file != '') {
                foreach ($request->assignment_file_file as $row) {
                    $Assignment_subs_file = new Assignment_subs_file();
                    $name = time() . '-' . $row->getClientOriginalName();
                    $row->move(public_path('upload_file/'), $name);
                    $Assignment_subs_file->assignment_subs_id = $Assignment_sub->assignment_subs_id;
                    $Assignment_subs_file->assignment_subs_files = $name;
                    $Assignment_subs_file->assignment_subs_files_name = $row->getClientOriginalName();
                    $Assignment_subs_file->save();
                }
            }

            $Assignment = Assignment_User::find($request->assignment_users_id);
            $Assignment->assignment_users_status = 2;
            $Assignment->save();

        } else {
            $Assignment_sub = new Assignment_sub();
            $Assignment_sub->assignment_subs_details = $request->assignment_details_send;
            $Assignment_sub->assignment_users_id = $request->assignment_users_id;
            $Assignment_sub->save();

            if ($request->assignment_file_file != '') {
                foreach ($request->assignment_file_file as $row) {
                    $Assignment_subs_file = new Assignment_subs_file();
                    $name = time() . '-' . $row->getClientOriginalName();
                    $row->move(public_path('upload_file/'), $name);
                    $Assignment_subs_file->assignment_subs_id = $Assignment_sub->assignment_subs_id;
                    $Assignment_subs_file->assignment_subs_files = $name;
                    $Assignment_subs_file->assignment_subs_files_name = $row->getClientOriginalName();
                    $Assignment_subs_file->save();
                }
            }

        }
        return response()->json($request->all());
    }

    public function AssignmentNewUpdate(Request $request)
    {
        $assignment = Assignment::find($request->assignments_id);
        $assignment->assignments_update = $request->count_sub;
        $assignment->save();
    }

}
