<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ImageUpload;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    use ImageUpload;
    public function dashboard()
    {
        return view('dashboard');
    }
    public function index()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt($request->only('email', 'password'))) {
            if (Auth::user()->role == 0) {
                Session::flash('message', 'user login succesfully');
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('home');
            }
        } else {
            Session::flash('user_message', 'email and password does not match');
            return redirect()->route('login');
        }
    }

    public function changepassword()
    {
        return view('changepassword');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required',
        ]);
        if (!Hash::check($request->old_password, Auth::guard('admin')->user()->password)) {
            Session::flash('message', 'old password does not match!');
            return redirect()->route('admin.changepass');
        }
        User::whereId(Auth::user()->id)->update([
            'password' => Hash::make($request->password),
        ]);
        Session::flash('message', 'password change successfully');
        return redirect()->route('dashboard');
    }
    public function logout()
    {
        Auth::logout();
        Session::flash('message', 'user logout successfully');
        return redirect()->route('login');
    }
    public function editform()
    {
        $user = Auth::user()->id;
        $data = User::find($user);
        return view('editprofile', compact('data'));
    }
    public function edit_user(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'fullname' => 'required',
            'image' => 'mimes:png,jpg,jpeg|max:2048'
        ]);
        $user = User::where('id', $id)->first();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->fullname = $request->fullname;
        $image = $this->uploadImage(public_path('upload/image'), $request, 'image');
        $user->image = $image['data'];
        $user->update();

        Session::flash('message', 'profile updated successfully');
        return redirect()->route('dashboard');
    }
    public function home()
    {
        return view('home');
    }
}
