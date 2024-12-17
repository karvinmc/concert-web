<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Singer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class singersController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $singers = Singer::paginate(12);
    return view('admin.singers.index', compact('singers'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    // Validate the input data
    $request->validate([
      'singerName' => 'required|string|max:255',
      'singerProfile' => 'required|string',
      'imagePath' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $imagePath = null;

    // Check if an image file is provided
    if ($request->hasFile('imagePath')) {
      // Store the image and get the file path
      $imagePath = $request->file('imagePath')->store('images/singers', 'public');
    }

    // Create a new singer record in the database
    Singer::create([
      'name' => $request->singerName,
      'profile' => $request->singerProfile,
      'image_path' => $imagePath,
    ]);

    // Redirect back to the singers index
    return redirect()->route('singers.index')->with('success', 'Singer added successfully!');
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $singer = Singer::findOrFail($id);
    return view('admin.singers.edit')->with('singer', $singer);
  }


  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    // Validate the input
    $request->validate([
      'singerName' => 'required|string|max:255',
      'singerProfile' => 'required|string',
      'imagePath' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $singer = Singer::findOrFail($id);
    $imagePath = $singer->image_path;

    // Check if a new image was uploaded
    if ($request->hasFile('imagePath')) {
      // Delete old image if a new one is uploaded
      if ($singer->image_path) {
        Storage::delete('public/' . $singer->image_path);
      }

      // Store the new image and get the file path
      $imagePath = $request->file('imagePath')->store('images/singers', 'public');
    }

    // Update the singer's data
    $singer->update([
      'name' => $request->singerName,
      'profile' => $request->singerProfile,
      'image_path' => $imagePath,
    ]);

    // Redirect with success message
    return redirect()->route('singers.index')->with('success', 'Singer updated successfully');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    Singer::findOrFail($id)->delete();
    return redirect()->route('singers.index')->with('success', 'Singer deleted successfully');
  }
}
