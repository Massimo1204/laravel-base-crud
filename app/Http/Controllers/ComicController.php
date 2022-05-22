<?php

namespace App\Http\Controllers;

use App\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
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
                'title' => 'required|min:3|max:100',
                'description' => 'required|min:10',
                'thumb' => 'required|min:3',
                'price' => 'required|numeric',
                'series' => 'required|min:3|max:50',
                'sale_date' => 'required|date',
                'type' => 'required|min:3|max:50',
            ],
            [
                'required' => ':attribute is required',
                'numeric' => ':numeric must be numeric',
            ]
        );

        $data = $request->all();

        $newComic = new Comic;
        $newComic->title = $data['title'];
        $newComic->description = $data['description'];
        $newComic->thumb = $data['thumb'];
        $newComic->price = $data['price'];
        $newComic->series = $data['series'];
        $newComic->sale_date = $data['sale_date'];
        $newComic->type = $data['type'];
        $newComic->save();

        return redirect()->route('comics.show', $newComic->id)
        ->with('created-message', 'New comic created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::findOrFail($id);
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $request->validate([
                'title' => 'required|min:3|max:100',
                'description' => 'required|min:10',
                'thumb' => 'required|min:3',
                'price' => 'required|numeric',
                'series' => 'required|min:3|max:50',
                'sale_date' => 'required|date',
                'type' => 'required|min:3|max:50',
            ],
            [
                'required' => ':attribute is required',
                'numeric' => ':numeric must be numeric',
            ]
        );
        
        $data = $request->all();

        $columns = ['title','description','thumb','price','series','sale_date','type'];

        foreach ($columns as $key => $value) {
            $comic->$value = $request[$value];
        }

        $comic->save();

        return redirect()->route('comics.show', $comic)
        ->with('message', 'Changes applied successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('comics.index')
        ->with('delete-message', 'Comic successfuly deleted');
    }
}
