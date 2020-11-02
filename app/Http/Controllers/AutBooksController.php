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

    public function getAllData()
    {
        $ids= AutBook::pluck('book_id');
        $books = Books::pluck('id');
        foreach($ids as $id){
            $arr[]=$id;
        }
        foreach($books as $book){
            $arr2[]=$book;
        }
        $contains=array_intersect($arr,$arr2);
        $names=[];
        $keys=[];
        foreach($contains as $book){
            //getting author_id via book_id in table author_book
            $author_id = DB::table('author_book')->select('author_id')->where('book_id', $book)->first();
            //getting author name using author_id
            $author = DB::table('authors')->select('aname')->where('id', $author_id->author_id)->first();
            array_push($keys,$book);
            array_push($names,$author->aname);
            $boo[] = DB::table('books')->find($book);
        }
        $general=array_combine($keys,$names);//dictionary with keys=book_id, and values=authors

        return view('home', ['books' => $boo,'anames'=>$general]);
    }
}
