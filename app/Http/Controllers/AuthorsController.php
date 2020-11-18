<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
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

    /**
     * Creating new Author.
     * @param Request $request
     * @return RedirectResponse
     */
    public function storeAut(Request $request)
    {
        $validatedData = $request->validate([
            'aname' => 'required|max:255',
        ]);
        Authors::create($request->all());
        return redirect()->route('add')->with('message', 'Author Created');
    }

    /**
     * Getting info about author using author_id.
     * @param $id
     * @return Application|Factory|View
     */
    public function editAuthor($id)
    {
        return view('admin.editAut',['data'=>Authors::find($id)]);
    }

    /**
     * Submitting author's data after edit.
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function subAuthor(Request $request,$id)
    {
        $validatedData = $request->validate([
            'aname' => 'required|max:255',
        ]);
        $aut=Authors::find($id);
        $aut->aname = $request->input('aname');
        $aut->save();
        return redirect()-> route('authors')/*->with('info','Profile got saved')*/;
    }

    /**
     * Deleting Author via id.
     * @param $id
     * @return RedirectResponse
     */
    public function deleteAuthor($id)
    {
        $aut=Authors::find($id);

        if ($aut != null) {
            $aut->delete();
            return redirect()-> route('authors')->with(['message'=> 'Successfully deleted!!']);
        }

        return redirect()->route('authors')->with(['message'=> 'Wrong ID!!']);
    }
}
