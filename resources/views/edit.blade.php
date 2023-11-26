<!DOCTYPE html>


<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
       


       

        <title>Laravel</title>

       
        



        @extends('layouts.app')

        
    </head>
    @section('content')
    <div class="container">
    
    <form  action="{{ route('ticket.update', $ticket->id) }}"  method="post" enctype="multipart/form-data" >
    @csrf
    @method('patch')
    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name="title" value="{{ $ticket->title }}" placeholder="Voer Title in">
    <input-error :messages="$errors->get('title')" class="mt-2"/>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <x-textarea placeholder="Voer description in" name="description" id="description" value="{{ $ticket->description }}" />
  </div>
  
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  
  @if  ($ticket->attachment)
  <div class="mb-3">
  <label for="attachment" class="form-label">Default file input example</label>
  <input class="form-control" type="file" name="attachment" id="attachment" value="{{ $ticket->attachment }}" text="kakaka">
  <img width="100" height="80"  class="rounded" alt="Cinque Terre" src="{{ URL::asset('./storage/'). '/' .$ticket->attachment }}" />
  <small id="emailHelp" class="form-text text-muted">{{$ticket->attachment}}</small>
  </div>
  @endif
  <button type="submit" class="btn btn-primary" >Submit</button>
</form>

   
    </div>
    

    @endsection
    
</html>
