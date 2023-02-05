@extends('templetes.nav')

@section('title') NewPost Info @endsection
@section('content')
{{-- {{dd($posts)}} --}}
<div class="container">
    <h1 align="center">I'm storing right nw </h1>
    {{-- I'm storing right nw 
    @foreach($dataArray as $key => $value)
    <h2 class="text-center"  >
       {{ $key}} : {{$value}}
    </h2>
    
    @endforeach --}}

</div>
<form action="{{route('posts.index',['posts' => $posts])}}" method="POST">
    @csrf
    @method('post')
    <a href="{{route('posts.index',['posts' => $posts])}}">To All Posts</a>
</form>
@endsection