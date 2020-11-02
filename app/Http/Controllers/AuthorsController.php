<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorsController extends Controller
{
    /**
     * Getting authors with book counts.
    */
    public function getAllAuthors()
    {
        $auts = Authors::pluck('id');
        $indexes=[];//in order to get rid of bugs with authors deleting
        foreach($auts as $aut){
            array_push($indexes,$aut);
            $arr[] =Authors::find($aut)->author_book()->where('author_id', $aut)->count();
        }
        $general=array_combine($indexes,$arr);//dictionary with keys=author_id, and values=book_counts
        $authors = DB::table('authors')->get();
        return view('authors', ['authors' => $authors,'book_counts'=>$general]);
    }
    public function storeAut(Request $request)
    {
        $validatedData = $request->validate([
            'aname' => 'required|max:255',
        ]);
        Authors::create($request->all());
        return redirect()->route('add')->with('message', 'Author Created');
    }
}
