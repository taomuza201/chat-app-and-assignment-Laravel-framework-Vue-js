<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Assignment;
use App\Assignment_sub;
use App\Assignment_file;
use App\Assignment_User;
use Illuminate\Http\Request;
use App\Assignment_subs_file;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class HomechatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('chat.home');
    }

    public function test()
    {
        $assignment = Assignment::select('*', 'assignment_users.created_at as assignments_created_at', 'assignments_by as files', 'assignments_by as assignment_users',
            'assignments_by as sub',  'assignments_by as time_left')
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

            $remaining_day = Carbon::now()->diffInDays(Carbon::parse($assignment[$index]->assignments_date));
            $remaining_day =  Carbon::parse(Carbon::now())->diffInDays(Carbon::parse($assignment[$index]->assignments_date),false) + 1 ;
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
        }

        return response()->json($assignment);

    }

    public function vue()
    {
        return view('vue');
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
}
