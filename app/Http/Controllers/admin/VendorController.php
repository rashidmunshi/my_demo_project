<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Symfony\Component\Console\Input\Input;
use Yajra\DataTables\Facades\DataTables;

class VendorController extends Controller
{

    use ImageUpload;
    public function register_form()
    {
        return view('vendor.register');
    }

    public function register_user(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,NUL6L,id,deleted_at,NULL',
        ]);
        $vendor = new User;
        $vendor->role = $request->role;
        $vendor->first_name = $request->first_name;
        $vendor->last_name = $request->last_name;
        $vendor->fullname = $request->fullname;
        $vendor->email = $request->email;
        $vendor->password = Hash::make($request->password);
        if ($request->status == '1') {
            $value = 1;
        } else {
            $value = 0;
        }
        $vendor->status = $value;

        $image = $this->uploadImage(public_path('vendor/image'), $request, 'image');
        $vendor->image = $image['data'];
        $vendor->save();
        Session::flash('success_message', 'user register successfully');
        return redirect()->route('list');
    }

    public function venderlist(Request $request)
    {
        $user = User::where('role', 1)->orderBy('created_at', 'desc')->get();
        return view('vendor.vendorlist', compact('user'));
    }
    public function destroy($id)
    {
        $user = User::destroy($id);
        Session::flash('message', 'user deleted successfully');
        if ($user == 1) {
            $success = true;
            $message = "User deleted successfully";
        } else {
            $success = false;
            $message = "User not found";
        }
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        return view('vendor.editvendor', compact('user'));
    }
    public function update_vendor(Request $request, $id)
    {

        $user = User::where('id', $id)->first();

        if ($user->email == $request->email) {
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->fullname = $request->fullname;
            $image = $this->uploadImage(public_path('vendor/image/'), $request, 'image');
            $user->image = $image['data'];
            $user->update();
            Session::flash('success_message', 'user updated successfully');
            return redirect()->route('list');
        } else {
            $request->validate([
                'email' => 'required|email|unique:users,email,NULL,id,deleted_at,NULL',
                'image' => 'mimes:png,jpg,jpeg|max:2048'
            ]);
            $user->email = $request->email;
            $user->update();
            Session::flash('success_message', 'user updated successfully');
            return redirect()->route('list')->with('user updated');
        }
    }
    public function update($id)
    {
        $user = User::whereId($id)->first();
        $status = ($user->status == 1) ? 0 : 1;
        User::whereId($id)->update(['status' => $status,]);
        if ($status) {
            return response()->json([
                "status" => true,
                'message' => 'status updated successfully'
            ]);
        } else {
            return response()->json([
                "status" => false,
                'message' => 'status not updated'
            ]);
        }
    }
    public function dashborad()
    {
        return view('vendor.dashboard');
    }
}
