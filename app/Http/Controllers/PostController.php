<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.add');
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
            'name' => 'required',
            'description' => 'required'
        ]);

        $post = Post::create($request->all());
        if ($post) {
            return redirect()->route('post.index')->with('success', 'Data Berhasil ditambahkan!!');
        } else {
            return redirect()->route('post.index')->with('error', 'Data Gagal ditambahkan');
        }
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
    public function edit(Post $post)
    {
        $this->authorize('update', $post); //from policy
        $posts = Post::whereId($post->id)->first();
        return view('post.edit', compact('posts'));
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
            'name' => 'required',
            'description' => 'required'
        ]);

        $post = Post::whereId($id)->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        if ($post) {
            return redirect()->route('post.index')->with('success', 'Data Berhasil diubah!!');
        } else {
            return redirect()->route('post.index')->with('error', 'Data Gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('update', $post);
        $post = Post::whereId($post->id)->delete();
        if ($post) {
            return redirect()->route('post.index')->with('success', 'Data Berhasil dihapus!!');
        } else {
            return redirect()->route('post.index')->with('error', 'Data Gagal dihapus');
        }
    }
}
