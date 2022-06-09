@extends('components.layout')
@section('content')


<div class="d-flex justify-content-center">
    <div class="card mt-5" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title text-center">Update my profile</h5>
          <form action="{{ url('/users/'.$user->id) }}" method="POST" autocomplete="off">
            @csrf
            {{ method_field('PATCH') }}
            <div class="pt-3 mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" 
                placeholder="John Doe" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}" 
                placeholder="name@example.com" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">New Password</label>
                <input type="password" class="form-control" name="password" id="password" 
                placeholder="" autocomplete="off">
            </div>
            <div class="pt-3 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </form>
          
        </div>
      </div>
</div>
@endsection