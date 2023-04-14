<?php

namespace App\Http\Controllers\Guest;
use App\Models\Comic;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    public function index() {
        $comics = Comic::all();
        
        return view('comics.index',compact('comics'));
    }

    public function show(Comic $comic){
        return view('comics.show', compact('comic'));
    
    }
}
