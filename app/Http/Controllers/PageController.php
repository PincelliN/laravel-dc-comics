<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;
use App\Functions\Helper;
use App\Http\Requests\ComicRequest;

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
    public function store(ComicRequest $request)
    {
       /*  $request->validate([
            'title'=>'required|min:5|max:100',
            'thumb'=>'required|extensions:jpg,png,gif|starts_with:https://www.',
            'price'=>'required|min:3|max:10',
            'series'=>'required|min:2|max:100',
            'sale_date'=>'required',
            'type'=>'required|min:3|max:50'
        ],[
            'title.required' => 'Il campo titolo è obbligatorio.',
            'title.min' => 'Il titolo deve avere almeno 5 caratteri.',
            'title.max' => 'Il titolo non può superare i 255 caratteri.',

            'thumb.required' => 'Il campo immagine è obbligatorio.',
            'thumb.extensions' => 'L\'immagine deve avere un\'estensione valida (jpg, png, gif).',
            'thumb.starts_with' => 'L\'URL deve iniziare con https://www.',

            'price.required' => 'Il campo prezzo è obbligatorio.',
            'price.min' => 'Il prezzo deve essere di almeno 3 caratteri.',
            'price.max' => 'Il prezzo non può superare i 10 caratteri.',

            'series.required' => 'Il campo serie è obbligatorio.',
            'series.min' => 'La serie deve avere almeno 2 caratteri.',
            'series.max' => 'La serie non può superare i 100 caratteri.',

            'sale_date.required' => 'La data di uscita è obbligatoria.',

            'type.required' => 'Il campo tipo è obbligatorio.',
            'type.min' => 'Il tipo deve avere almeno 3 caratteri.',
            'type.max' => 'Il tipo non può superare i 50 caratteri.'
        ]); */
        $data=$request->all();
          dd($data);

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
    public function update(ComicRequest $request, string $id)
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
