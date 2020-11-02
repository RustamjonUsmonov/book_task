<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use App\Models\Books;
use Illuminate\Http\Request;

class AutBooksController extends Controller
{
    public function addNew()
    {
        $authors=Authors::select('aname','id')->get();
        $books=Books::select('bname','id')->get();

        return view('admin.add-new',['authors'=>$authors,'books'=>$books]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:books|max:255',
            'body' => 'required',
        ]);
    }
}
