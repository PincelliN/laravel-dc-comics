<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;
use App\Functions\Helper;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $comics=Comic::all();

        return view('comics.index',compact('comics'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(('comics.create'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->all();
        /*  dd($data); */
        $new_comic= new Comic();

         /* $new_comic->title=$data['title'];
        $new_comic->slug=Helper::generateSlug($new_comic->title,Comic::class);
        $new_comic->description=$data['description'];
        $new_comic->thumb=$data['thumb'];
        $new_comic->price=$data['price'];
        $new_comic->series=$data['series'];
        $new_comic->sale_date=$data['sale_date'];
        $new_comic->type=$data['type']; */
        $data['slug'] = Helper::generateSlug($data['title'],Comic::class);
         $new_comic->fill($data);
        $new_comic->save();


        return redirect()->route('comics.show',$new_comic->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comic= Comic::find($id);

        return view('comics.show',compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comic=Comic::find($id);
        return view('comics.edit',compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $data=$request->all();
         $comic=Comic::find($id);


         /* $new_comic->title=$data['title'];
        $new_comic->slug=Helper::generateSlug($new_comic->title,Comic::class);
        $new_comic->description=$data['description'];
        $new_comic->thumb=$data['thumb'];
        $new_comic->price=$data['price'];
        $new_comic->series=$data['series'];
        $new_comic->sale_date=$data['sale_date'];
        $new_comic->type=$data['type']; */
        if($comic['title'] != $data['title']){
         $data['slug'] = Helper::generateSlug($data['title'],Comic::class);
        }

        $comic->update($data);


        return redirect()->route('comics.show',$comic->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comic=Comic::find($id);
        $comic->delete();

        return redirect()->route('comics.index')->with('delete','Il prodotto'.$comic->title.'é stato eliminato dal database');
    }
}