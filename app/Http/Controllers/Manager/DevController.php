<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreDevRequest;
use App\Http\Requests\UpdateDevRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class DevController extends Controller
{
    //
    public function index(){
        $users = User::whereRole('developer')->get();
        return view('manager.dev.index', compact('users'));

    }
    public function create(){
        return view('manager.dev.create');
    }

    public function store(StoreDevRequest $request){
        
        $data = $request->except(['_token', 'password2']);
        $data['password'] = bcrypt($data['password']);
        $data['role'] = 'developer';
        $data['addedby'] = auth()->user()->id;

        $user = User::create($data);
        
        Log::info('Admin ID: '.$data['addedby'].' Thêm mới dev #'.$user->id, ['data' => $request->all()]);

        if($user){
            return redirect()->route('edit.dev', $user->id)->with('success', 'Thêm kỹ thuật viên thành công');
        }
        return back()->with('error', 'Thêm kỹ thuật viên không thành công');
    }

    public function edit(User $user){
        return view('manager.dev.edit', compact('user'));
    }

    public function update(UpdateDevRequest $request){

        $data = $request->except(['_token', 'password2', 'password', 'avatar', 'id', '_method']);

        if($request->password){
            $data['password'] = bcrypt($request->password);
        }

        $user = User::find($request->id);

        $file = $request->file('avatar');

        if($file){

            $name = $file->hashName(); // Generate a unique, random name...

            $path = $request->file('avatar')->storeAs(
                $request->id, $name, 'uploads'
            );

            $data['avatar'] = '/public/uploads/users/'.$path;
        }

        $user->update($data);

        Log::info('Admin ID: '.auth()->user()->id.' Cập nhật dev #'.$user->id, ['data' => $request->all()]);

        if($user){
            return back()->with('success', 'Cập nhật kỹ thuật viên thành công');
        }
        return back()->with('error', 'Cập nhật kỹ thuật viên không thành công');
    }

    public function delete($id)
    {
        User::where('id',$id)->delete();
        return redirect()->route('index.dev');
    }
}
