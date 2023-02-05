
@extends('layouts.app')



@section('title')All Posts @endsection
@section('content')
    <div class="container">
        <div class="text-center">
           <a href="{{route('posts.create')}}">
            <button type="button" align="center" class="mt-4 btn btn-success">Create Post</button>
            </a> 
            <a href="{{route('users.create')}}">
                <button type="button" align="center" class="mt-4 btn btn-warning">Create user</button>
                </a> 
        </div>
      <br>
      <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Posted By</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                    {{-- {{dd($posts)}} --}}
                @foreach($posts as $post)
                <tr>
                    <td>{{$post['id']}}</td>
                    <td>{{$post['title']}}</td>
                   
                    <td>{{isset($post->user->name)?$post->user->name:"notFound"}}</td>
                 
                    <td>{{$post['created_at']}}</td>
                   
                    <td>{{$post['description']}}</td>
                    <td>
                        @if(is_null($post['deleted_at']))
                        <a href="{{route('posts.show',$post['id'])}}" class="btn btn-info">View</a>
                        <a href="{{route('posts.edit',$post['id'])}}" class="btn btn-primary">Edit</a>
                       
                        <form action="{{route('posts.destroy',$post['id'])}}" method="POST">
                        @csrf
                        @method('delete')
                            <button type="submit" href="" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')" >Delete</button>
                        </form>
                        @endif
                       {{-- {{dd($post['deleted_at'])}} --}}
                        @if(!is_null($post['deleted_at']))
                        <form action="{{route('posts.restore',$post['id'])}}" action="get"> 
                         @csrf
                       
                         <button type="submit" class="btn btn-light" >Restore</button>
                        </form>
                        @endif
                       
                    </td>
                </tr>
                @endforeach
                </tbody>
          </table>
          {{-- to paginate between pages if we use pagination --}}
          {{$posts->links()}}
          {{-- <a href="{{route('posts')}}">Next</a>
          <a href="{{route('posts.index')}}">Previous</a> --}}
    </div>
    
  @endsection