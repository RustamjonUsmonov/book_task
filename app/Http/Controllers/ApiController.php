<?php

namespace App\Http\Controllers;

use App\Models\AutBook;
use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function getBooks()
    {
        $ids= AutBook::pluck('book_id')->toArray();
        $books = Books::pluck('id')->toArray();
        $contains=array_intersect($ids,$books);
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

    foreach($boo as $key=>$data)
    {
        if(array_key_exists($data->id, $general))
        {
            $waw[]=array($data->bname,$general[$data->id]);
        }
    }
        return response()->json(['books' => $waw],200);
    }

    public function getOne($id)
    {
        $book = DB::table('books')->find($id);
        return response()->json(['Book'=>$book],200);
    }

    public function updateBook($id,Request $request)
    {
        $book = Books::where('id', $id)
            ->update([
                'bname'=> request()->bname,
            ]);
        return response()->json(['Book'=>$book],200);
    }

    public function deleteBook($id)
    {
        $book = Books::where('id', $id)->delete();
        return response()->json(['Book'=>'Deleted'],200);
    }
}
