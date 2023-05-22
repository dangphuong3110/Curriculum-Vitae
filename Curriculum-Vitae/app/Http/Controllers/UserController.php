<?php

namespace App\Http\Controllers;

use App\Mail\VerificationEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        return view('guest/profile/user/index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        return view('guest/profile/user/edit-name', compact('user'));
    }

    public function editPassword(string $id)
    {
        $user = User::findOrFail($id);

        return view('guest/profile/user/edit-password', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->save();

        return redirect()->route('user.edit', $id)->with('success', 'Name has been updated successfully.');
    }

    public function updatePassword(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        if(Hash::check($request->input('current-password'), $user->password) == FALSE){
            return redirect()->route('user.password', $id)->with('failure', 'The current password is incorrect.');
        }

        if($request->input('new-password') != $request->input('confirm-password')){
            return redirect()->route('user.password', $id)->with('failure', 'The new password and confirm password do not match.');
        }

        $user->password = Hash::make($request->input('new-password'));
        $user->save();

        return redirect()->route('user.password', $id)->with('success', 'Password has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showRegistrationForm() {
        return view('login/register');
    }

    public function register(Request $request)
    {
        // Kiểm tra dữ liệu nhập vào từ form
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        // Nếu dữ liệu không hợp lệ, chuyển hướng với thông báo lỗi
        // if ($validator->fails()) {
        //     return redirect()->route('register-form')->with('failure', 'Có lỗi');
        // }

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Tạo tài khoản người dùng mới
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'verification_code' => mt_rand(100000, 999999), // Tạo mã xác nhận ngẫu nhiên
            'verified' => false, // Chưa xác thực
        ]);

        // Gửi email xác nhận đến địa chỉ email người dùng
        $this->sendVerificationEmail($user);

        // Chuyển hướng đến trang xác nhận mã
        return redirect()->route('verify-code-form');
    }

    // Gửi email xác nhận
    public function sendVerificationEmail($user)
    {
        $data = [
            'name' => $user->name,
            'verification_code' => $user->verification_code,
        ];

        // Mail::send('login/verify-code', $data, function ($message) use ($user) {
        //     $message->to($user->email, $user->name)->subject('Xác nhận địa chỉ email');
        // });
        Mail::to($user->email)->send(new VerificationEmail($data));
    }

    public function verifyCodeForm() {
        return view('login/verify');
    }

    // Xử lý xác thực mã
    public function verifyCode(Request $request)
    {
        // Kiểm tra mã xác nhận
        $user = User::where('verification_code', $request->input('verification-code'))->get()->first();

        if ($user !== NULL) {
            // Xác thực tài khoản
            $user->verified = true;
            $user->save();

            // Chuyển hướng đến trang nào đó sau khi xác thực thành công
            return redirect()->route('login')->with('success', 'Registration successful.');
        }

        // Nếu mã xác nhận không đúng, chuyển hướng với thông báo lỗi
        return redirect()->route('verify-code-form')->with('failure', 'Invalid verification code. Please check your email.');
    }
 
}
