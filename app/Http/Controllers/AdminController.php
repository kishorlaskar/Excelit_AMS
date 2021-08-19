<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
//user user show
    public function user(){
       $users= User::all();

        return view('admin.user',compact('users'));
    }
//Add user  form
public function addUserForm(){
        return view('admin.add-user');
}
//Add user
//    public function storeUser(Request $request ){
//
//        $request->validate([
//            'name' =>'required|min:3|max:20',
//            'email' =>'required|min:3|max:20|unique:User',
//            'password' =>'required|min:8|max:20|,
//
//
//
//        ]);
//
//        return redirect()->back();
//    }
public function StoreUser(Request $request)
{

    $request->validate([
        'name' =>'required|min:3|max:20',
        'role'=>'required',
        'email' =>'required',
        'password' =>'required',
    ]);

    $add_user = new User();
    $add_user->name = $request->name;
    $add_user->email = $request->email;
    $add_user->role = $request->role;
    $add_user->password = Hash::make($request->password);
    $add_user->save();

    return redirect()->route('user');
}
public function EditUser($id)
{
    $user = User::find($id)->role;
    $edit_user =User::find($id);
    return view('admin.edit-user',compact('edit_user','user'));
}
public function updateUser(Request $request,$id)
{
    $add_user = User::find($id);
    $add_user->name = $request->name;
    $add_user->email = $request->email;
    $add_user->role = $request->role;
    $add_user->password = Hash::make($request->password);
    $add_user->update();

    return redirect()->route('user');
}
public function deleteUser($id)
{
    $delete_user = User::destroy($id);
    return redirect()->back();
}
public function inactive($id)
{
    User::where('id',$id)->update(['status'=>1]);
    return Redirect::back();
}
    public function active($id)
    {
        User::where('id',$id)->update(['status'=>0]);
        return Redirect::back();
    }
}
