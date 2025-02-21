<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class LoginController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
    public function loginSubmit(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'messageType' => 'error',
                'message' => $validator->errors()->all(),
            ]);
        }

        // Retrieve user
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'messageType' => 'error',
                'message' => 'User not found!',
            ]);
        }

        // Check if the password is correct
        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'messageType' => 'error',
                'message' => 'Invalid email or password!',
            ]);
        }

        // Attempt to log in
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json([
                'messageType' => 'success',
                'message' => 'Login successful!',
            ]);
        }

        return response()->json([
            'messageType' => 'error',
            'message' => 'Login failed!',
        ]);
    }

}
