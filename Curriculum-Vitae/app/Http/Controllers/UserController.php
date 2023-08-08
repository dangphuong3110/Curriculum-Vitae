<?php

namespace App\Http\Controllers;

use App\Jobs\SendVerificationMessage;
use App\Mail\ResetCodeEmail;
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
        return view('guest.profile.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('error.error');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return view('error.error');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('error.error');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        return view('guest.profile.user.edit-name', compact('user'));
    }

    public function editPassword(string $id)
    {
        $user = User::findOrFail($id);

        return view('guest.profile.user.edit-password', compact('user'));
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
        return view('error.error');
    }

    public function showRegistrationForm() {
        return view('login.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::where('email', $request->input('email'))->get()->first();

        if($user && !$user->verified){
            $user->name = $request->input('name');
            $user->password = Hash::make($request->input('password'));
            $user->verification_code = mt_rand(100000, 999999);
            $user->save();

            SendVerificationMessage::dispatch($user);
        }

        elseif ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        else {
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'verification_code' => mt_rand(100000, 999999),
                'verified' => false,
            ]);

            SendVerificationMessage::dispatch($user);
        }

        return redirect()->route('verify-code-form');
    }

    public function verifyCodeForm() {
        return view('login.verify');
    }

    public function verifyCode(Request $request)
    {
        $user = User::where('verification_code', $request->input('verification-code'))->where('verified', false)->get()->first();

        if ($user) {
            $user->verified = true;
            $user->save();

            return redirect()->route('login')->with('success', 'Registration successful.');
        }

        return redirect()->route('verify-code-form')->with('failure', 'Invalid verification code. Please check your email.');
    }

    public function showForgotPasswordForm()
    {
        return view('login.forgot-password.send-email');
    }

    public function sendResetCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::where('email', $request->input('email'))->get()->first();

        if($user && $user->verified) {
            $user->reset_password_code = mt_rand(100000, 999999);
            $user->save();

            $this->sendResetCodeEmail($user);

            session(['email' => $user->email]);
            return redirect()->route('reset-password-form');
        }

        return redirect()->route('forgot-password-form')->with('failure', 'Email not found.');
    }

    public function sendResetCodeEmail($user)
    {
        $data = [
            'name' => $user->name,
            'reset_password_code' => $user->reset_password_code,
        ];

        Mail::to($user->email)->send(new ResetCodeEmail($data));
    }

    public function showResetPasswordForm()
    {
        $email = session('email');

        if (!$email) {
            return redirect()->route('forgot-password-form')->with('failure', 'Invalid request.');
        }

        return view('login.forgot-password.reset-password', compact('email'));
    }

    public function resetPassword(Request $request, $email)
    {
        $validator = Validator::make($request->all(), [
            'reset-password-code' => 'required|numeric',
            'new-password' => 'required|string|min:6',
            'confirm-password' => 'required|string|same:new-password',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::where('email', $email)->where('reset_password_code', $request->input('reset-password-code'))->get()->first();

        if ($user) {
            $user->password = Hash::make($request->input('new-password'));
            $user->reset_password_code = NULL;
            $user->save();

            return redirect()->route('login')->with('success', 'Password reset successful.');
        }

        return redirect()->route('reset-password-form')->with('failure', 'Invalid reset password code. Please check your email.');
    }
}
