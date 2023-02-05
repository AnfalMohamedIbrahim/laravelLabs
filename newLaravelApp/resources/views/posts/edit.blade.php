
@extends('layouts.app')
{{-- {{dd($post)}} --}}

@section('title') Post edit form @endsection
@section('content')
    <div class="container">
        <br>
        <form action="{{route('posts.update',$post['id'])}}" method="Post">
            @csrf
            @method('put')
            <div class="mb-3">
               {{-- {{dd($post)}} --}}
                <label class="form-label">Title</label>
                <input name="title" type="text" class="form-control" value="{{$post['title']}}" >
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control">{{$post['description']}} </textarea>
            </div>
            <div class="mb-3 ">
                <label class="form-label" for="exampleCheck1">Post Creator</label>
                
                <select name="post_creator" class="form-control" disabled>
                    <option selected>{{$user->name}}</option>

                </select>
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>

    
    </div>
@endsection