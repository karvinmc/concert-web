<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Concert;
use App\Models\Singer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Carbon\Carbon;

class concertsController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $concerts = Concert::with('singer')->paginate(12);
    $singers = Singer::all();
    return view('admin.concerts.index', compact('concerts', 'singers'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    // Validate the input data
    $request->validate([
      'singerID' => 'required|exists:singers,id',
      'concertName' => 'required|string|max:255',
      'concertDesc' => 'required|string',
      'concertDate' => 'required|date',
      'concertLoc' => 'required|string|max:255',
      'concertDefPrice' => 'required|numeric|min:0',
      'imagePath' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $imagePath = null;

    // Check if an image file is provided
    if ($request->hasFile('imagePath')) {
      // Store the image and get the file path
      $imagePath = $request->file('imagePath')->store('images/concerts', 'public');
    }

    // Format the concert date to 'Y-m-d'
    $formattedDate = Carbon::parse($request->concertDate)->format('Y-m-d');

    // Create a new concert record in the database
    Concert::create([
      'singer_id' => $request->singerID,
      'name' => $request->concertName,
      'description' => $request->concertDesc,
      'date' => $formattedDate,
      'location' => $request->concertLoc,
      'default_price' => $request->concertDefPrice,
      'image_path' => $imagePath,
    ]);

    // Redirect back to the concerts index
    return redirect()->route('concerts.index')->with('success', 'Concert added successfully!');
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $concert = Concert::findOrFail($id);
    $singers = Singer::all();
    return view('admin.concerts.edit')->with('concert', $concert)->with('singers', $singers);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, $id)
  {
    // Validate the input data
    $request->validate([
      'singerID' => 'required|exists:singers,id',
      'concertName' => 'required|string|max:255',
      'concertDesc' => 'required|string',
      'concertDate' => 'required|date',
      'concertLoc' => 'required|string|max:255',
      'concertDefPrice' => 'required|numeric|min:0',
      'imagePath' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Find the concert by its ID
    $concert = Concert::findOrFail($id);

    // Format the concert date to 'Y-m-d'
    $formattedDate = Carbon::parse($request->concertDate)->format('Y-m-d');

    // Get the current image path or set it to null if no image
    $imagePath = $concert->image_path;

    // Check if a new image file is provided
    if ($request->hasFile('imagePath')) {
      // Delete the old image if it exists
      if ($concert->image_path) {
        Storage::delete('public/' . $concert->image_path);
      }

      // Store the new image and get the file path
      $imagePath = $request->file('imagePath')->store('images/concerts', 'public');
    }

    // Update the concert record in the database
    $concert->update([
      'singer_id' => $request->singerID,
      'name' => $request->concertName,
      'description' => $request->concertDesc,
      'date' => $formattedDate,
      'location' => $request->concertLoc,
      'default_price' => $request->concertDefPrice,
      'image_path' => $imagePath,
    ]);

    // Redirect back to the concerts index with a success message
    return redirect()->route('concerts.index')->with('success', 'Concert updated successfully!');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    Concert::findOrFail($id)->delete();
    return redirect()->route('concerts.index')->with('success', 'Ticket deleted successfully');
  }
}
