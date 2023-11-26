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
            <th scope="col">{{ $ticket->title }}</th>
            
            <th scope="col"></th>
            
            </tr>
        </thead>
        
        <tbody>
            <tr>
            <td><img width="40" height="30"  class="rounded" alt="Cinque Terre" src="{{ URL::asset('./storage/'). '/' .$ticket->attachment }}" /></td>
           
            <td>{{ $ticket->description }}</td>
            <td><a href="{{ route('ticket.edit', $ticket->id) }}"> <button class="btn btn-primary" >Edit</button>  </a>
                <button class="btn btn-danger" >Delete</button></td>
            <td></td>
            <td>{{ $ticket->created_at->diffForHumans() }}</td>
            </tr>
        </tbody>
        
    </table>
    
    </div>
    

    @endsection
    
</html>
