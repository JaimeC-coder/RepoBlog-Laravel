<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,Tag $tag)
    {
        
        $request->validate([
            'name' => "required|unique:tags,name,$tag->id|max:255",
            'slug' => "required|unique:tags,slug,$tag->id|max:255",
            'color' => "required|unique:tags,color,$tag->id",
        ]);
        $tag->create($request->all());
        return redirect()->route('admin.tags.index', compact('tag'))->with('success', 'Tag created successfully');
        return $request->all();
    
    
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
        return view('admin.tags.index', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
        return view('admin.tags.edit', compact('tag'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Tag $tag)
    {
        //
        $request->validate([
            'name' => "required|unique:tags,name,$tag->id|max:255",
            'slug' => "required|unique:tags,slug,$tag->id|max:255",
            'color' => "required|unique:tags,color,$tag->id",
        ]);
        $tag->update($request->all());
        return redirect()->route('admin.tags.index', $tag)->with('success', 'Tag updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('success', 'Tag deleted successfully');
    }
}
