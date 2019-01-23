<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Hash;

class DashboardController extends Controller
{
    public function index()
    {
        return view('back.pages.index.index');
    }

    public function addUserForm()
    {
        return view('back.pages.users.add-user');
    }

    public function addUser(Request $request)
    {
        $this->validate($request,
        [
            'name'  => 'required|min:4',
            'email' => 'required|email',
            'password'  => 'required|min:4',
            'image' => 'nullable|image'
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image');

            $ext = $image->getClientOriginalExtension();

            $imageName = time().'.'.$ext;

            $image->move(public_path('images/'),$imageName);
        }

        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
            'thumbnail' => isset($imageName) ? $imageName : ''
        ]);
        if($user){

           return redirect('admin/users');
        }
        return redirect()->back();
    }

    public function users()
    {
        $users = User::all();

        return view('back.pages.users.users',compact('users'));
    }

    public function delete($id)
    {
        $user = User::find($id);
        if($user){
            if($user->delete()){
                return redirect()->back()->with('success',$user->name.' has been deleted');
            }
            return redirect()->back()->with('error','Failed to delete');
        }
        return redirect()->back()->with('error','User not found');
    }

    public function edit($id)
    {
        $detail = User::find($id);

        return view('back.pages.users.edit-user',compact('detail'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,
        [
            'name'      => 'required|string|min:4',
            'email'     => 'required|email|unique:users,email,'.$id
        ]);

        $user = User::find($id);

        if($user){
            if($user->update(['name'=>$request->name,'email'=>$request->email])){
                return redirect('admin/users');
            }
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function changePasswordForm()
    {
        return view('back.pages.setting.setting');
    }
    public function changePassword(Request $request)
    {
        $this->validate($request,
        [
            'old_password'  => 'required|min:4',
            'password'      => 'required|confirmed|min:4',
        ]);
        if(Hash::check($request->old_password, auth()->user()->password)){
            if(auth()->user()->update(['password'=>bcrypt($request->password)])){

                return redirect()->back()->with('success','Your password has been updated.');
            }
            return redirect()->back();
        }
        return redirect()-back();
    }
}
