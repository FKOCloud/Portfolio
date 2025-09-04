<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Typertitle;
use Illuminate\Http\Request;

class TypertitleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.Typertitle.index',);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('admin.Typertitle.create',);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required','max:200']
        ]);

        $create = new Typertitle();
        $create->title =  $request->title;
        $create->save();
        flash()->success('Title added succesfully');
        return redirect()->route('admin.Typertitle.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
