<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dohvata sve postove
        return Post::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //validiranje podataka
        $request->validate([
            'title'=>'required',
        ]);
        // kreiranje posta
        return Post::create($request->all());
        $post = Post::create([
            'title'=> $request->title,
            'slug'=>$request->slug,
            'content'=>$request->content,
            'user_id'=>Auth::user()->id,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // prikazi post  
        return Post::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // update post
        $post = Post::find($id);
        $post->update($request->all());
        return $post;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //obrisi post
        return Post::destroy($id);
    }
}
