<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::pluck('name', 'id');
        // $tags=Tag::pluck('name','id');
        $tags = Tag::all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request) //agregando el storePostReques llamas a la validacion creada anteriomente en el
    {
        //
        //return "ok";
        //  return $request->file('file');
        $post = Post::create($request->all());
        // if ($request->tags) {
        //     $post->tags()->attach($request->tags);
        // }
       // return redirect()->route('admin.posts.edit', $post);
        if ($request->file('file')) {
            $url = Storage::disk('public')->put('posts', $request->file('file'));
            $post->image()->create([
                'url' => $url
            ]);
        }
        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }
        return redirect()->route('admin.posts.edit', $post)->with('info', 'El post se creo con exito');
    }

    //


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        return view('admin.posts.show', compact('post'));


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

        $this->authorize('author', $post);
        $categories = Category::pluck('name', 'id');

        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        //
        $this->authorize('author', $post);
        $post->update($request->all());
        if ($request->file('file')) {
            $url = Storage::disk('public')->put('posts', $request->file('file'));
            if ($post->image) {
                Storage::disk('public')->delete($post->image->url);//eliminas la imagen que ya a estado guardada
                $post->image->update([
                    'url' => $url
                ]);
            } else {
                $post->image()->create([
                    'url' => $url
                ]);
            }
        }

        if ($request->tags) {
            $post->tags()->sync($request->tags);//sinchroniza los tags con los que ya estan guardados
        }
        return redirect()->route('admin.posts.edit', $post)->with('success', 'El post se actualizo con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $this->authorize('author', $post);
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'El post se elimino con exito');
    }
}
