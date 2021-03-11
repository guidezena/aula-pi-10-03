<?php

namespace App\Http\Controllers;

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
        return view('tag.index')->with('tags', Tag::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('tag.create');
    }
    public function store(Request $request)
    {
        Tag::create($request->all());
        session()->flash('success','Tag cadastrada com sucesso');
        return redirect(route('tag.index'));
    }
    public function show(Tag $tag)
    {
        //
    }

    public function edit(Tag $tag)
    {
        return view('tag.edit')->with('tag', $tag);
    }

    public function update(Request $request, Tag $tag)
    {
        $tag->update($request->all());
        session()->flash('success','Tag foi alterada com sucesso!');
        return redirect(route('tag.index'));
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        session()->flash('success','Tag foi deletada com sucesso!');
        return redirect(route('tag.index'));
    }
}
