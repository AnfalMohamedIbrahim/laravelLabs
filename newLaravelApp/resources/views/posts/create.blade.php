
@extends('templetes.nav')

@section('title') Post form @endsection
@section('content')
    <div class="container">
        <br>
        <form action="{{route('posts.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input name="title" type="text" class="form-control" >
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control"> </textarea>
            </div>
            <div class="mb-3 ">
                <label class="form-label" for="exampleCheck1">Post Creator</label>
                <select name="post_creator" class="form-select" aria-label="select example" >
                    <option selected>Open there are select menu</option>
              
                    @foreach($users as $user)
                     {{-- {{ dd($user->id)}} --}}
                    <option value="{{$user->id}}" >{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Create post</button>
        </form>

    
    </div>
@endsection