<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class PostController extends Controller
{
    /**
     * List all posts
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::orderby('created_at','desc')->withCount("comments")->paginate(6);

        return view('posts.index', compact('posts'));
    }

    //Display one post detail
    public function show(Post $post)
    {
        $post->load("comments");//Pre-load, for better performance
        return view('posts.show', compact('post'));
    }

    //Create a new post and save it
    public function create()
    {
        return view('posts.create');
    }

    /*
        * Any form submit has 3 steps to deal with
        * Step1: validation
        * Step2: business logic
        * Step3: pass a blade or redirect
        *
     * */

    public function store()
    {

//        $post = new Posts();
//        $post->title = \request('title');
//        $post->content = \request('content');
//        $post->save();

        //Step 1 : Validation the data coming from front request
        $this->validate(\request(), [
            'title'   => 'required|string|max:100|min:5',
            'content' => 'required|string|min:100'
        ]);
        //Error Message can be put here, but it is not a standard localization way.
//        All the error messages can be put \resources\lang\

        // Step 2 : Business Logic
//        $params = ['title'=>\request('title'),'content'=>\request('content')];

        $user_id = \Auth::id();
//        $params = request(['title', 'content']);
        $params = array_merge(\request(['title','content']),compact('user_id'));
        Post::create($params);


        //Step 3 : Render page to front
        //Dump and Die
//        dd(\request());

        return redirect("/posts");
    }

    //Edit a post and update it
    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));

    }

    public function update(Post $post)
    {
        //Step 1: Validate
        $this->validate(\request(), [
            'title'   => 'required|string|max:100|min:5',
            'content' => 'required|string|min:100'
        ]);

        //Step 2: Do business logic
        //User policy
        $this->authorize('update',$post);

        $post ->title = \request('title');
        $post ->content = \request('content');
        $post->save();

        //Step 3: Render page to front
        return redirect("/posts/{$post->id}");

    }

    //Delete a post
    public function delete(Post $post)
    {
        $this->authorize('delete',$post);
        $post->delete();
        return redirect("/posts");

    }

    //upload image
    public function imageUpload(Request $request){

        $path = $request->file('wangEditorH5File')->storePublicly(md5(time()));
        return asset('storage/'.$path);
//        dd(\request()->all());
//        echo asset('storage/phpstorm.png');
    }

    //comment save (Form submit)
    public function comment(){
//        dd(\request()->all());

        //Step 1 : Validate form request data
        $this->validate(\request(),[
            'post_id'=>'required|exists:posts,id',
            'content'=>'required|min:3',
        ]);

        //Step 2 : Business Logic
        $user_id = \Auth::id();

        $params = array_merge(
            request(['post_id', 'content']),
            compact('user_id')
        );
        \App\Comment::create($params);

        //Step 3: Render page to front
        return back();
    }
}
