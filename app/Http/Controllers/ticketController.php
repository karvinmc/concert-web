<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Ticket;
use App\Models\Concert;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Carbon\Carbon;

class ticketController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $tickets = Ticket::with('concert')->paginate(12);
    $concerts = Concert::all();
    return view('admin.tickets.index', compact('tickets', 'concerts'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    // Validate the input data
    $request->validate([
      'concertID' => 'required|exists:concerts,id',
      'price' => 'required|numeric|min:0',
      'seats' => 'required|integer|min:1',
    ]);

    // Create a new concert record in the database
    Ticket::create([
      'concert_id' => $request->concertID,
      'time' => $request->time,
      'price' => $request->price,
      'seats' => $request->seats,
    ]);

    // Redirect back to the concerts index
    return redirect()->route('tickets.index')->with('success', 'Ticket added successfully!');
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $ticket = Ticket::findOrFail($id);
    $concerts = Concert::all();
    return view('admin.tickets.edit')->with('ticket', $ticket)->with('concerts', $concerts);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, $id)
  {
    // Validate the input data
    $request->validate([
      'concertID' => 'required|exists:concerts,id',
      'time' => 'required',
      'price' => 'required|numeric|min:0',
      'seats' => 'required|integer|min:1',
    ]);

    // Find the ticket by its ID
    $ticket = Ticket::findOrFail($id);

    // Update the ticket record in the database
    $ticket->update([
      'concert_id' => $request->concertID,
      'time' => $request->time,
      'price' => $request->price,
      'seats' => $request->seats,
    ]);

    // Redirect back to the tickets index with a success message
    return redirect()->route('tickets.index')->with('success', 'Ticket updated successfully!');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    Ticket::findOrFail($id)->delete();
    return redirect()->route('tickets.index')->with('success', 'Ticket deleted successfully');
  }
}
