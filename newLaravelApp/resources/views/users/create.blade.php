
@extends('templetes.nav')

@section('title') Post form @endsection
@section('content')
    <div class="container">
        <br>
        <form action="{{route('users.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input name="name" type="text" class="form-control" >
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input name="email" class="form-control" type="email"> 
            </div>
            <div class="mb-3">
                <label class="form-label">password</label>
                <input name="pass" class="form-control" type="password"> 
            </div>
           
            <button type="submit" class="btn btn-success">Create</button>
        </form>

    
    </div>
@endsection