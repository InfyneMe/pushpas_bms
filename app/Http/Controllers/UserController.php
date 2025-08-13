<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function index(){
        $users = User::all(); // Fetch all users from the database
        return view('admin.users', compact('users'));
    }

    public function store(Request $request)
    {
        try {
            // Updated validation rules to match your form fields
            $data = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'phone' => 'nullable|string|max:15',
            ], [
                // Custom error messages
                'first_name.required' => 'First name is required.',
                'last_name.required' => 'Last name is required.',
                'email.required' => 'Email address is required.',
                'email.email' => 'Please enter a valid email address.',
                'email.unique' => 'This email address is already registered.',
                'password.required' => 'Password is required.',
                'password.min' => 'Password must be at least 8 characters long.',
                'password.confirmed' => 'Password confirmation does not match.',
            ]);

            // Combine first and last name for the users table
            $data['name'] = $data['first_name'] . ' ' . $data['last_name'];
            $data['password'] = Hash::make($data['password']);
            $data['role'] = 'allmighty';

            User::create($data);

            return redirect()->route('users.list')->with('success', 'User created successfully.');
        } catch (ValidationException $e) {
            return back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            // Log::error('User creation error: ' . $e->getMessage());
            return back()->withErrors(['error' => 'An unexpected error occurred. Please try again.'])->withInput();
        }
    }
}
