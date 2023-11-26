<!DOCTYPE html>


<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
       


       

        <title>Laravel</title>

       
        



        @extends('layouts.app')

        
    </head>
    @section('content')
    <div class="container">
    
    
    @csrf
    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

    <h1 class="text-BLACK text-lg font-bold"> SUPPORT TICKETS</h1>
    <table class="table table-striped">
    
        <thead>
            <tr>
            <th scope="col"></th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col"></th>
            
            </tr>
        </thead>
        @foreach($tickets as $ticket) 
        <tbody>
            <tr>
            <th scope="row">{{ $ticket->id }}</th>
            <td><a href="{{ route('ticket.show', $ticket->id) }}">{{ $ticket->title }}  </a></td>
            <td>{{ $ticket->description }}</td>
            <td>{{ $ticket->created_at->diffForHumans() }}</td>
            <td><a href="{{ route('logout') }}">{{ $ticket->title }}  </a>Approved</td>
            <td><a href="{{ route('logout') }}">{{ $ticket->title }}  </a>Rejected</td>
            </tr>
        </tbody>
        @endforeach
    </table>
   
    
    </div>
    

    @endsection
    
</html>
