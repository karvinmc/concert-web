<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\User;

use Illuminate\Http\Request;

class usersController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $users = User::paginate(12);
    return view('admin.users.index', compact('users'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    // Validate the input data
    $request->validate([
      'username' => 'required|string|max:255',
      'email' => 'required|email',
      'password' => 'required|string|min:8',
      'role' => 'required',
    ]);

    // Hash the password before storing it
    $hashedPassword = bcrypt($request->password);

    // Create a new user record in the database
    User::create([
      'name' => $request->username,
      'email' => $request->email,
      'password' => $hashedPassword,
      'is_admin' => $request->role,
    ]);

    // Redirect back to the singers index
    return redirect()->route('users.index')->with('success', 'User added successfully!');
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $user = User::findOrFail($id);
    return view('admin.users.edit')->with('user', $user);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    // Validate the input data
    $request->validate([
      'username' => 'required|string|max:255',
      'email' => 'required|email',
      'password' => 'required|string|min:8',
      'role' => 'required',
    ]);

    // Find the user by ID
    $user = User::findOrFail($id);

    // Prepare the update data
    $data = [
      'name' => $request->username,
      'email' => $request->email,
      'is_admin' => $request->role,
    ];

    // If a new password is provided, hash it and add it to the update data
    if ($request->password) {
      $data['password'] = bcrypt($request->password);
    }

    // Update the user's data using the update method
    $user->update($data);

    // Redirect back to the users index with a success message
    return redirect()->route('users.index')->with('success', 'User updated successfully!');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    User::findOrFail($id)->delete();
    return redirect()->route('users.index')->with('success', 'User deleted successfully');
  }
}
