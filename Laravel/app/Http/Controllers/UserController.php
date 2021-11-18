<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'asc')->get();
        return view('admin.users-manage', compact('users'));
    }

    /**
     * To count total number of users
     * 
     * @return Analytics blade with number of users
     */
    public function countTotalUsers()
    {
        $numTotalUsers =  User::where('deleted_at', null)->count();
        return response()->json($numTotalUsers);
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->deleted_user_id = 1;
        $user->deleted_at = now();
        $user->save();
        return redirect('/admin/users');
    }
}
