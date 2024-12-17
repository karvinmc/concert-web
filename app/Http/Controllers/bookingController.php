<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Booking;
use App\Models\User;
use App\Models\Ticket;

use Illuminate\Http\Request;

class bookingController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $bookings = Booking::with('user')->with('ticket')->paginate(12);
    $users = User::all();
    $tickets = Ticket::all();
    return view('admin.bookings.index', compact('bookings', 'users', 'tickets'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    // Validate the input data
    $request->validate([
      'username' => 'required',
      'ticketID' => 'required',
    ]);

    // Create a new Booking record in the database
    Booking::create([
      'user_id' => $request->username,
      'ticket_id' => $request->ticketID,
    ]);

    // Redirect back to the concerts index
    return redirect()->route('bookings.index')->with('success', 'Booking added successfully!');
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $booking = Booking::findOrFail($id);
    $users = User::all();
    $tickets = Ticket::all();
    return view('admin.bookings.edit')->with('booking', $booking)->with('users', $users)->with('tickets', $tickets);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, $id)
  {
    // Validate the input data
    $request->validate([
      'username' => 'required',
      'ticketID' => 'required',
    ]);

    // Find the booking by its ID
    $booking = Booking::findOrFail($id);

    // Update the booking record with the new values
    $booking->update([
      'user_id' => $request->username,
      'ticket_id' => $request->ticketID,
    ]);

    // Redirect back to the bookings index with a success message
    return redirect()->route('bookings.index')->with('success', 'Booking updated successfully!');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    Booking::findOrFail($id)->delete();
    return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully');
  }
}
