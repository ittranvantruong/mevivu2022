<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Traits\SendApi;

class CustomerController extends Controller
{
    //
    // use SendApi;
    protected $domain;

    public function __construct(){
        $this->domain = 'https://quantri.mevivu.com/admin/api';
    }
    public function index(){
        $users = User::whereRole('customer')->get();
        return view('manager.customer.index', compact('users'));
    }

    public function create(){
        return view('manager.customer.create');
    }

    public function store(StoreCustomerRequest $request){
        $data = $request->all();
        $user = User::create($data);
        return redirect()->route('edit.customer', $user->id)->with('success', 'Thêm thành công');
    }

    public function edit(User $user){
        return view('manager.customer.edit', compact('user'));
    }

    public function update(UpdateCustomerRequest $request){
        $data = $request->collect();
        $user = User::find($data['id']);

        $data_edit_info['id'] = $user->api_id;
        $data_edit_info['name'] = $data['fullname'];
        $data_edit_info['sdt'] = $user->phone;
        $data_edit_info['email'] = $data['email'];
        $data_edit_info['diachi'] = $data['address'];
        // dd($data_edit_info);
        // $response = $this->callApi($this->domain.'/khachhangedit.php', 'post', $data_edit_info);
        $response = Http::asForm()->post($this->domain.'/khachhangedit.php', $data_edit_info);
        $response = $response->object();

        if($response->status == 0 || $response->status == null || $response == null){
            return back()->with('error', 'Cập nhật thất bại');
        }
        if($request->filled('password')){
            $response = Http::asForm()->post($this->domain.'/resetmatkhau.php', [
                'id' => $user->api_id,
                'password' => $data['password']
            ]);
            $response = $response->object();
            if($response->status == 0 || $response->status == null || $response == null){
                return back()->with('error', 'Cập nhật mật khẩu thất bại');
            }
        }

        $user->update($data->only('fullname', 'email', 'address')->toArray());

        return back()->with('success', 'Cập nhật thành công');
        
    }

    public function checkInfo(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ],[
            'username.required' => 'Vui lòng nhập tên đăng nhập',
            'password.required' => 'Vui lòng nhập mật khẩu'
        ]);

        if($validator->fails()){
            return response($validator->errors(), 400);
        }
        //kiểm tra khách hàng có được tạo hay chưa
        if(User::wherePhone($request->username)->exists()) {
            return response()->json([
                'status' => 0,
                'message' => 'Khách hàng đã tồn tại trên hệ thống'
            ], 200);
        }
        //gửi yêu cầu tới api để kiểm tra thông tin
        $response = Http::asForm()->post($this->domain.'/dangnhap.php', [
            'username' => $request->username,
            'password' => $request->password,
        ]);
        
        $response = $response->object();

        //không tìm thấy khách hàng trên hệ thống
        if($response->status == 0 || $response == null) {
            return response()->json([
                'status' => 0,
                'message' => 'không tìm thấy khách hàng trên hệ thống'
            ], 200);
        }

        session()->put('check-info-customer', $response);
        return response()->json([
            'status' => 1,
            'message' => 'Lấy thông tin thành công',
            'data' => $response
        ], 200);

    }
}
