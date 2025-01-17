<?php

namespace authrole2fa\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use PragmaRX\Google2FA\Google2FA;
use Exception;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('authrole2fa::auth.login');
    }

    public function login(Request $request)
    {
        // Add your login logic here
    }

    public function showRegisterForm()
    {
        return view('authrole2fa::auth.register');
    }

    public function register(Request $request)
    {
        // Start a database transaction
        DB::beginTransaction();

        try {
            // Validate the incoming request
            $validated = $request->validate([
                'user_designation_id' => 'required|integer|exists:designations,id',
                'user_name' => 'required|string|max:255|unique:users,user_name',
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'phone' => 'required|string|max:15|unique:users,phone',
                'email' => 'required|string|email|max:255|unique:users,email',
                'password' => 'required|string|min:8|confirmed',
            ]);

            // Generate a 2FA secret key for the user
            // $google2fa = new Google2FA();
            // $secret = $google2fa->generateSecretKey();

            // Create the user in the database
            $user = User::create([
                'user_designation_id' => $validated['user_designation_id'],
                'user_name' => $validated['user_name'],
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'phone' => $validated['phone'],
                'email' => $validated['email'],
                'email_verified_at' => null,  // Email not verified by default
                'password' => $validated['password'],
                'added_by' => auth()->id(),  // Assuming the user is logged in, use their ID
                'remember_token' => Str::random(60),
                'two_factor_secret' => $secret,
                'two_factor_enabled' => true,
                'two_factor_verified_at' => null,
            ]);

            // Commit the transaction
            DB::commit();

            // Send confirmation or 2FA instructions
            // You may want to send an email here with 2FA setup instructions
            
            return response()->json([
                'message' => 'User registered successfully, 2FA secret generated.',
                'user' => $user
            ], 201);
            
        } catch (Exception $e) {
            // Rollback the transaction in case of error
            DB::rollBack();

            // Handle the error (logging, etc.)
            return response()->json([
                'error' => 'Registration failed, please try again.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
