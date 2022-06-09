@extends('components.layout')
@section('content')

@if(Session::has('message'))
<div class="alert alert-danger" role="alert"> 
 {{Session::get('message')}}
</div>
@endif

<div class="d-flex justify-content-center">
    <div class="card mt-5" style="width: 25rem;">
        <div class="card-body">
           
          <h5 class="card-title text-center">Questions</h5>
          <form action="{{ url('next_reset_password') }}" method="POST">
            @csrf
            <div class="pt-3 mb-3">
                <label for="email" class="form-label">What is your email?</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
            </div>
            <div class="mb-3">
                <label for="question1" class="form-label">Who is your best childhood friend?</label>
                <input type="text" class="form-control" name="question1" id="question1" placeholder="" required>
            </div>
            <div class="mb-3">
                <label for="question2" class="form-label">What is the name of your first school?</label>
                <input type="text" class="form-control" name="question2" id="question2" placeholder="" required>
            </div>
            <div class="pt-3 text-center">
                <button type="submit" class="btn btn-primary">Next</button>
            </div>
          </form>
          
        </div>
      </div>
</div>
@endsection