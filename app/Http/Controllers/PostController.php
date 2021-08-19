<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function add()
    {
        return view('post.add');
    }
    function store(Request $request)
    {
        $input = $request->all();
        Post::create($input);

        return redirect('post/show')->with('success', 'Thêm bài viết thành công!');
    }

    function show(Request $request)
    {

        $data = Post::paginate(3);
        return view('post.show', compact('data'));
    }
}
