<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class VendorController extends Controller
{
    public function register_form()
    {
        return view('vendor.register');
    }

    public function register_user(Request $request)
    {
        $vendor = new User;
        $vendor->role = $request->role;
        $vendor->first_name = $request->first_name;
        $vendor->last_name = $request->last_name;
        $vendor->fullname = $request->fullname;
        $vendor->email = $request->email;
        $vendor->password = Hash::make($request->password);
        if ($request->status == 1) {
            $value = 0;
        } else {
            $value = 1;
        }
        $vendor->status = $value;
        $destination = 'vendor/image';
        $vendor->image = $request['image']->getClientOriginalName();
        $request['image']->move(public_path($destination), $vendor->image);
        $vendor->save();
        Session::flash('message', 'user register successfully');
        return redirect()->route('list');
    }

    public function venderlist(Request $request)
    {
        $user = User::where('role', 1)->get();
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



    public function update_vendor(Request $request,$id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'fullname' => 'required',
            'image' => 'mimes:png,jpg,jpeg|max:2048'
        ]);
        $user = User::where('id', $id)->first();
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->fullname=$request->fullname;
        if($request->status == 1){
            $status=0;
        }
        else{
            $status=1;
        }
        $user->status=$status;
        if ($request->hasFile('image')) {
            $file_path = 'vendor/image' . $user->image;
            if (File::exists($file_path)) {
                File::delete($file_path);
            }
            $file = $request->file('image');
            $user->image = time() . '.' . $file->getClientOriginalExtension();
            $file->move('vendor/image', $user->image);
        }
        $user->update();
        return redirect()->route('list')->with('user updated');
    }

    public function update($id)
    {
        // dd($request->status);
        $user = User::whereId($id)->first();
        $status = ($user->status == 1) ? 0 : 1;
        User::whereId($id)->update(['status' => $status,]);
        if($status){
            return response()->json([
                "status"=>true,
                'message'=>'status updated successfully'
            ]);
        }
        else{
            return response()->json([
                "status"=>false,
                'message'=>'status not updated'
            ]);
        }

    }
    public function dashborad()
    {
      return view('vendor.dashboard');
    }
}
