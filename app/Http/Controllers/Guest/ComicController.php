<?php

namespace App\Http\Controllers\Guest;
use App\Models\Comic;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\validation\Rule;

class ComicController extends Controller
{
    public function index() {
        $comics = Comic::all();
        
        return view('comics.index',compact('comics'));
    }

    public function show(Comic $comic){
        return view('comics.show', compact('comic'));
    
    }
    public function create(){
        return view('comics.create');
    
    }
    
    public function store(Request $request)

    {
        $data = $request->validate([
            'title'=> 'required|max:255|min:3',
            'thumb'=> 'required|max:255|url',
            'type'=> 'required',rule::in(['comic book','graphic novel']),
            'series'=> 'required|max:255|string',
            'sale_date'=> 'required|max:20',
            'price'=> 'required|max:20',
            'description'=> 'nullable|string ',
        ]);
        // $data = $request->all();

        $new_comic = new Comic();

        $new_comic->title = $data['title'];
        $new_comic->thumb = $data['thumb'];
        $new_comic->type = $data['type'];
        $new_comic->series = $data['series'];
        $new_comic->sale_date = $data['sale_date'];
        $new_comic->price = $data['price'];
        $new_comic->description = $data['description'];

        $new_comic->save();

        return to_route('comics.show', $new_comic);
    }
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    public function update(Request $request, Comic $comic)
    {
        $data = $request->validate([
            'title'=> 'required|max:255|min:3',
            'thumb'=> 'required|max:255|url',
            'type'=> 'required',rule::in(['comic book','graphic novel']),
            'series'=> 'required|max:255|string',
            'sale_date'=> 'required|max:20',
            'price'=> 'required|max:20',
            'description'=> 'nullable|string ',
        ]);
        
        // $data = $request->all();

        $comic->title = $data['title'];
        $comic->thumb = $data['thumb'];
        $comic->type = $data['type'];
        $comic->series = $data['series'];
        $comic->sale_date = $data['sale_date'];
        $comic->price = $data['price'];
        $comic->description = $data['description'];

        $comic->save();

        return to_route('comics.show', $comic);
    }
    public function destroy(Comic $comic)
    {

        
        $comic->delete();

        return to_route('comics.index');
    }
}
    
   