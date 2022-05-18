<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::post('/NewRegister', 'Auth\RegisterController@NewRegister')->name('NewRegister');
Route::get('/test', 'HomechatController@test')->name('test');

Route::group(['middleware' => 'auth'], function () {
    // Route::get('/home', 'HomeController@index')->name('home');
    // Route::get('/chats', 'ChatController@index')->name('chats');


    Route::get('/messages', 'ChatController@fetchAllMessages')->name('fetchMessages');
    Route::post('/messages', 'ChatController@sendMessage')->name('sendMessage');
    Route::get('/getUser', 'ChatController@getUser')->name('getUser');
    Route::get('/getChatGroup', 'ChatController@getChatGroup')->name('getChatGroup');
    Route::get('/GetUserGroup', 'ChatController@GetUserGroup')->name('GetUserGroup');

    Route::post('/MessageUploadFile', 'ChatController@MessageUploadFile')->name('MessageUploadFile');
    Route::post('/edit_profile', 'ChatController@edit_profile')->name('edit_profile');
    Route::post('/edit_profile_picture', 'ChatController@edit_profile_picture')->name('edit_profile_picture');
    Route::post('/reset_password', 'ChatController@reset_password')->name('reset_password');
    Route::get('/delete_messages', 'ChatController@delete_messages')->name('delete_messages');
    Route::get('/fetcFile', 'ChatController@fetcFile')->name('fetcFile');
    Route::get('/SeenMessages', 'ChatController@SeenMessages')->name('SeenMessages');
    Route::post('/created_group', 'ChatController@created_group')->name('created_group');
    Route::get('/getMemberChatGroup', 'ChatController@getMemberChatGroup')->name('getMemberChatGroup');
    Route::get('/deleteMemberChatGroup', 'ChatController@deleteMemberChatGroup')->name('deleteMemberChatGroup');
    Route::post('/addMemberChatGroup', 'ChatController@addMemberChatGroup')->name('addMemberChatGroup');
    Route::get('/thisDataChatGroup', 'ChatController@thisDataChatGroup')->name('thisDataChatGroup');
    Route::get('/get_user_not_in_chat_group', 'ChatController@get_user_not_in_chat_group')->name('get_user_not_in_chat_group');

    Route::post('/addassignment', 'AssignmentController@addassignment')->name('addassignment');
    Route::post('/updatessignment', 'AssignmentController@updatessignment')->name('updatessignment');
    Route::get('/assignment_get', 'AssignmentController@assignment_get')->name('assignment_get');
    Route::get('/assignment_to', 'AssignmentController@assignment_to')->name('assignment_to');
    Route::get('/assignment_succus', 'AssignmentController@assignment_succus')->name('assignment_succus');
    Route::get('/assignment_to_succus', 'AssignmentController@assignment_to_succus')->name('assignment_to_succus');
    Route::post('/assignment_cancel', 'AssignmentController@assignment_cancel')->name('assignment_cancel');

    Route::get('/assignment_this', 'AssignmentController@assignment_this')->name('assignment_this');


    Route::post('/assignment_subs', 'AssignmentController@assignment_subs')->name('assignment_subs');


    Route::get('/AssignmentNewUpdate', 'AssignmentController@AssignmentNewUpdate')->name('AssignmentNewUpdate');


    Route::get('/updatgroup', 'ChatController@updatgroup')->name('updatgroup');
    Route::post('/updatgroup_profile', 'ChatController@updatgroup_profile')->name('updatgroup_profile');

    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');


    Route::get('/', 'HomechatController@index');


});
