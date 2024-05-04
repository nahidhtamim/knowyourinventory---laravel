<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserControlController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewUsers(){
        $users = User::all();
        return view('admin.user.view-users', compact('users'));
    }

    public function activeUser($id)
    {
        $plan = User::find($id);
        $plan->status = '1';
        $plan->update();
        return redirect()->back()->with('status', 'User Activated');
    }

    public function deactiveUser($id)
    {
        $plan = User::find($id);
        $plan->status = '0';
        $plan->update();
        return redirect()->back()->with('warning', 'User De-activated');
    }
    
    public function resetPassword($id)
    {
        $plan = User::find($id);
        $plan->password = Hash::make('12345678');
        $plan->update();
        return redirect()->back()->with('warning', 'User Password Has Been Reset');
    }

}
