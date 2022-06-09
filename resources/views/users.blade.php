@extends('components.layout')
@section('content')
@if(Session::has('message'))
<div class="alert alert-success" role="alert"> 
 {{Session::get('message')}}
</div>
@endif

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->status }}</td>
                        <td>
                            <!-- Example single danger button -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Change Status
                                </button>
                                <ul class="dropdown-menu">
                                    @if($user->status == 'Active')
                                    <li><a class="dropdown-item" href="{{ url('/change_status/'.$user->id) }}">Suspended</a></li>
                                    @elseif ($user->status == 'Suspended')
                                    <li><a class="dropdown-item" href="{{ url('/change_status/'.$user->id) }}">Active</a></li>
                                    @endif
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            {{ $users->links() }}
        </div>
            
    </div>

    
@endsection
