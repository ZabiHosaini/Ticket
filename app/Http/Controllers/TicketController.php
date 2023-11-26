<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Enums;
use Illuminate\Support\Str;

use Storage;
class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::all();
       // dd($tickets);
        return view('index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request)
    {
     //        $this->validate($request,[
    //      'attachment' => 'required',
      //      'title' => 'required',
      //      'description' => 'required'
      //  ]);
      $ticket = Ticket::create([

        'title' =>  $request->title,
        'description' =>  $request->description,
        'user_id' =>  '1',
     ]);
       if($request->file('attachment')){
        
        $this->storeAtachment($request,$ticket);
        
       }

    //dd($request);
      //  $path=$request->file('attachment')->store('public/fotos');
       

       

       
       return response($ticket);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        return view('show',compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        return view('edit',compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
       
       // $ticket->update($request->validated());
      
       $ticket->update(['title' => $request->title,'description' => $request->description]);


       if($request->file('attachment')){

        
        Storage::disk('public')->delete($ticket->attachment);

        $this->storeAtachment($request,$ticket);

       }

       return redirect(route('ticket.index'));
    

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        dd('inja delete ');
    }

    protected function storeAtachment ($request,$ticket)
    {
        $ext = $request->FILE('attachment')->extension();
        $contents = file_get_contents($request->file('attachment'));
        $filename = Str::random(25);
        $path = "fotos/$filename.$ext";
        Storage::disk('public')->put($path, $contents);
        $ticket->update(['attachment'=> $path ]);
    }
}
