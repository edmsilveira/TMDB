<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $posts = Posts::all();

        return view('posts.list', compact('posts'));
    }

    /**
     * Return a json of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $posts = Posts::where('post_title', 'like', '%'.$req->q.'%')->paginate(10);

        return response()->json($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'post_title'=>'required',
            'post_description'=>'required',
            'post_image'=>'required',
        ]);

      $post = new Posts([
            'post_title' => $request->get('post_title'),
            'post_description' => $request->get('post_description'),
            'post_image' => $request->get('post_image'),
            'post_video' => $request->get('post_video'),
            'post_link' => $request->get('post_link'),
            'post_target_self' => $request->get('post_target_self')
      ]);

      $post->save();
      return redirect('/posts/list')->with('success', 'Post has been saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Posts::find($id);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'post_title'=>'required',
            'post_description'=>'required',
            'post_image'=>'required',
          ]);

        $post = Posts::find($id);
        $post->post_title = $request->get('post_title');
        $post->post_description = $request->get('post_description');
        $post->post_image = $request->get('post_image');
        $post->post_video = $request->get('post_video');
        $post->post_link = $request->get('post_link');
        $post->post_target_self = $request->get('post_target_self');

      $post->save();

      return redirect('/posts')->with('success', 'The post: <em>' . $post->post_title . '</em>, has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Posts::find($id);
        $name = $post->post_title;
        $post->delete();

        return redirect('/posts')->with('success', '<strike> ' . $name . '</strike> has been deleted Successfully');
    }
}
