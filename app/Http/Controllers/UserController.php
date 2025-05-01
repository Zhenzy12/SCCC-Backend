<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $users = User::all(['id', 'firstName', 'middleName', 'lastName', 'email', 'email_verified_at', 'for_911', 'for_inventory', 'for_traffic_tracking', 'is_deleted']);
            return response()->json($users, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
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
        try {
            $request->validate([
                'firstName' => 'required|string|max:255',
                'middleName' => 'nullable|string|max:255',
                'lastName' => 'required|string|max:255',
                'email' => 'required|string|max:255',
                'password' => 'required|string|confirmed',
                'is_deleted' => 'required|boolean'
            ]);

            $users = User::create([
                'firstName' => $request->input('firstName'),
                'middleName' => $request->input('middleName'),
                'lastName' => $request->input('lastName'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'is_deleted' => $request->input('is_deleted'),
                'email_verified_at' => null
            ]);

            // Send verification email
            $users->sendEmailVerificationNotification();

            return response()->json(
                [
                    'message' => 'User created successfully. Please check your email for verification.',
                    'data' => $users,
                ],
                201,
            );
        } catch (\Exception $e) {
            return response()->json(['Store User Error' => $e->getMessage()], 500);
        }
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

    public function update(Request $request, User $user)
    {
        //
        try {
            $request->validate([
                'firstName' => 'sometimes|required|string|max:255',
                'middleName' => 'sometimes|nullable|string|max:255',
                'lastName' => 'sometimes|required|string|max:255',
                'email' => 'sometimes|required|string|max:255',
                'password' => 'sometimes|required|string',
                'is_deleted' => 'sometimes|required|boolean',
                'for_911' => 'sometimes|required|boolean',
                'for_inventory' => 'sometimes|required|boolean',

            ]);
            $user->update([
                'firstName' => $request->input('firstName'),
                'middleName' => $request->input('middleName'),
                'lastName' => $request->input('lastName'),
                'email' => $request->input('email'),
                'is_deleted' => $request->input('is_deleted'),
                'for_911' => $request->input('for_911'),
                'for_inventory' => $request->input('for_inventory'),
            ]);

            if ($request->filled('password')) {
                if (!Hash::check($request->input('password'), $user->password)) {
                    $user->password = Hash::make($request->input('password'));
                    $user->save(); // Save user if password is changed
                }
            }

            return response()->json([
                'message' => 'Successfully Updated',
                'data' => $user
            ]);
        } catch (\Exception $e) {
            return response()->json(['Update User Error' => $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function dashboard(Request $request, string $id)
    {
        //
        try {
            // Validate the incoming request
            $request->validate([
                'for_911' => 'required|boolean', // Ensure for_911 is required and boolean
            ]);

            // Find the resource (row) to update
            $resource = User::findOrFail($id);

            // Update the specific column (for_911)
            $resource->for_911 = $request->input('for_911');
            $resource->save();

            // Return updated resource
            return response()->json(['message' => 'Role updated successfully', $resource], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function inventory(Request $request, string $id)
    {
        //
        try {
            // Validate the incoming request
            $request->validate([
                'for_inventory' => 'required|boolean', // Ensure for_inventory is required and boolean
            ]);

            // Find the resource (row) to update
            $inventory_role = User::findOrFail($id);

            // Update the specific column (for_inventory)
            $inventory_role->for_inventory = $request->input('for_inventory');
            $inventory_role->save();

            // Return updated resource
            return response()->json(['message' => 'Role updated successfully', $inventory_role], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function archive(Request $request, string $id)
    {
        //
        try {
            // Validate the incoming request
            $request->validate([
                'is_deleted' => 'required|boolean', // Ensure for_911 is required and boolean
            ]);

            // Find the resource (row) to update
            $inventory_role = User::findOrFail($id);

            // Update the specific column (for_inventory)
            $inventory_role->is_deleted = $request->input('is_deleted');
            $inventory_role->save();

            // Return updated resource
            return response()->json(['message' => 'User Access Control has been modified successfully', $inventory_role], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function updateUserFor911(Request $request, User $user)
    {
        try {
            $validated = $request->validate([
                'firstName' => 'required|string|max:255',
                'middleName' => 'nullable|string|max:255',
                'lastName' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email,' . $user->id,
                'old_password' => 'nullable|string',
                'password' => 'nullable|string|confirmed|min:8',
                'password_confirmation' => 'nullable|string|min:8'
            ]);

            // Update basic profile information
            $user->firstName = $validated['firstName'];
            $user->middleName = $validated['middleName'];
            $user->lastName = $validated['lastName'];
            $user->email = $validated['email'];

            // Handle password update if provided
            if ($request->filled('password')) {
                if (!Hash::check($validated['old_password'], $user->password)) {
                    return response()->json([
                        'error' => 'Old password is incorrect.'
                    ], 403);
                }

                $user->password = Hash::make($validated['password']);
            }

            $user->save();

            return response()->json([
                'message' => 'Profile updated successfully',
                'data' => $user
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to update profile: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        try {
            $user->delete();
            return response()->json([
                'message' => 'Deleted Successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json(['Destroy User Error' => $e->getMessage()], 500);
        }
    }
}
