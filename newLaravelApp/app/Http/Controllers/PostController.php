<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
  
    public function index( Request $request)
    {
        // 
        $posts= Post::withTrashed()->paginate((5));
        
        // if ($request->has('view_deleted')) {
        //     $posts = $posts->onlyTrashed();
        // }
  
       
    //    $posts= Post::Paginate(5);
            // dd($posts);

            // dd($posts);
         $users=user::all();
           
        //   dd($users);
           return view('posts.index',['posts'=>$posts],['users'=>$users]);
       
    }

    public function show($postId)
    {
    //  dd($postId);
        $post=Post::find($postId);
        // dd($postInfo);
        $user=user::find($post['user_id']);
        // dd($user);
        return  view('posts.show',['post'=>$post],['user'=>$user]);

    }
    public function create()
    {
        $users=User::all();
        // dd($users);

       return view('posts.create',['users'=>$users]);
    }

    public function store(Request  $request)
    {
    //    dd($request);
       $data = $request->all();
    //    dd($data);
       $title=$data['title'];
       $description=$data['description'];
       $postCreator=$data['post_creator'];

       Post::create([
          'title'=>$title,
          'description'=>$description,
          'user_id'=>$postCreator,
       ]);
       return redirect('posts');
    }

  

    public function edit($postId)
    {
        //   dd($postId);
          $post = Post::find($postId);
        //   dd($post);
        $user=user::find($post['user_id']);
        // dd($user->name);
        return view('posts.edit',['post'=>$post],['user'=>$user]);


    }
    public function update(Request $request,$postId)
    {
        $data = $request->all();
    //   dd($data);
    // dd($postId);
      $title=$data['title'];
      $description=$data['description'];

      Post::where ('id',$postId)->update([

        'title'=>$title,
        'description'=>$description,    
      ]);
      return redirect('posts');
    }
    public function destroy($postId)
    {
        // dd($postId);
       Post::find($postId)->delete();
  
        return back();
        
    }
    public function restore($postId)
    {
        Post::withTrashed()->find($postId)->restore();
  
        return back();
    }  
}
