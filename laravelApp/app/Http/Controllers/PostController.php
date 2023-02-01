<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class PostController extends Controller
{
    
    public function index()
    {
        $posts = [
            [
                'id' => 1,
                'title' => 'learn PHP',
                'posted_by' => 'Ahmed',
                'created_at' => '2018-10-01 ',
            ],
            [
                'id' => 2,
                'title' => 'solid principals',
                'posted_by' => 'Mohamed',
                'created_at' => '2018-10-01',
            ],
            [
                'id' => 3,
                'title' => 'design Patterns',
                'posted_by' => 'Ali',
                'created_at' => '2018-10-01 ',
            ],
        ];

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function show($postId)
    {

        $post = [
            'id' => 1,
            'title' => 'learn PHP',
            'posted_by' => 'Ahmed',
            'created_at' => '2018-10-01 ',
        ];

        return view('posts.show',['post' => $post]);
    }
}
