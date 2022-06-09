@extends('components.layout')
@section('content')


<div class="d-flex justify-content-center">
    <div class="card mt-5" style="width: 25rem;">
        <div class="card-body">
           
          <h5 class="card-title text-center">Reset Password</h5>
          <form action="{{ url('/reset_password') }}" method="POST">
            @csrf
            <div class="pt-3 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}" disabled required>
                <input type="text" name="id" value="{{ $user->id }}" hidden>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">New password</label>
                <input type="text" class="form-control" name="password" id="password" placeholder="" required>
            </div>
            <div class="pt-3 text-center">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
          
        </div>
      </div>
</div>
@endsection