<!DOCTYPE html>


<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
       


       

        <title>Laravel</title>

       
        



        @extends('layouts.app')

        
    </head>
    @section('content')
    <div class="container">
    
    <form  action="{{ route('ticket.store') }}"  method="POST" enctype="multipart/form-data">
    @csrf
    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name="title" placeholder="Voer Title in">
    <input-error :messages="$errors->get('title')" class="mt-2"/>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <x-textarea  placeholder="Voer description in" name="description" id="description" />
  </div>
  
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <div class="mb-3">
  <label for="attachment" class="form-label">Default file input example</label>
  <input class="form-control" type="file" name="attachment" id="attachment">
</div>
  <button type="submit" class="btn btn-primary" >Submit</button>
</form>

   
    </div>
    

    @endsection
    
</html>
