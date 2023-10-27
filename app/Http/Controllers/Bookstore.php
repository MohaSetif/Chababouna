<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class Bookstore extends Controller
{
    //
    function list(){
        $data = Book::all();
        return view('library', ['books'=>$data]);
    }
}
