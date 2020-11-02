<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    /**
     * Getting authors with book counts.
     */
    public function getAllBooks()
    {
        $books = Books::pluck('id');
        $names=[];
        $keys=[];
        foreach($books as $book){
            //getting author_id via book_id in table author_book
            $author_id = DB::table('author_book')->select('author_id')->where('book_id', $book)->first();
            //getting author name using author_id
            $author = DB::table('authors')->select('aname')->where('id', $author_id->author_id)->first();
            array_push($keys,$book);
            array_push($names,$author->aname);
        }
        $general=array_combine($keys,$names);//dictionary with keys=book_id, and values=authors
        $boo = DB::table('books')->get();
        return view('books', ['books' => $boo,'anames'=>$general]);
    }

    public function edit_book($id)
    {
        return view('admin.editBook',['data'=>Books::find($id)]);
    }


    public function delete_book($id)
    {
       $book=Books::find($id)/*->delete()*/;

        if ($book != null) {
            $book->delete();
            return redirect()-> route('allBooks')->with(['message'=> 'Successfully deleted!!']);
        }

        return redirect()->route('allBooks')->with(['message'=> 'Wrong ID!!']);
    }

    public function submit(Request $request,$id)
    {
        $book=Books::find($id);
        $book->bname = $request->input('bname');
        $book->save();
       return redirect()-> route('allBooks')/*->with('info','Profile got saved')*/;
    }
}
