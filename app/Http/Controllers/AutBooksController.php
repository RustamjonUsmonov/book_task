<?php

namespace App\Http\Controllers;

use App\Models\AutBook;
use App\Models\Authors;
use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AutBooksController extends Controller
{
    public function addNew()
    {
        $authors=Authors::select('aname','id')->get();
        $ids= AutBook::pluck('book_id');
        $books = Books::pluck('id');
        foreach($ids as $id){
            $arr[]=$id;
        }
        foreach($books as $book){
            $arr2[]=$book;
        }
        $without_aut=array_diff($arr2,$arr);

        foreach ($without_aut as $idishnik)
        {
            $book_without_aut[]= DB::table('books')->find($idishnik);
        }
        return view('admin.add-new',['authors'=>$authors,'books'=>$book_without_aut]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'author_id' => 'required|int',
            'book_id' => 'required|int',
        ]);
        AutBook::create($request->all());
        return redirect()->route('add')->with('message', 'Success');

    }
}
