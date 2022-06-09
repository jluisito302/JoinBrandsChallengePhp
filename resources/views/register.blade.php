@extends('components.layout')
@section('content')


<div class="d-flex justify-content-center">
    <div class="card mt-5" style="width: 18rem;">
        <div class="card-body">
           
          <h5 class="card-title text-center">Register</h5>
          <form action="{{ url('/register') }}" method="POST">
            @csrf
            <div class="pt-3 mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="John Doe" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="" required>
            </div>
            <div class="pt-3 text-center">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
          </form>
          
        </div>
      </div>
</div>
@endsection