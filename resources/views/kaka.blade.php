



    
     @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
    
    
    <div class="container">
    
    <form  action="{{ route('ticket.store') }}"  method="POST" enctype="multipart/form-data">
    @csrf
    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name="title" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="text" class="form-control" id="description" aria-describedby="emailHelp" name="description" placeholder="Enter email">
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
 
   