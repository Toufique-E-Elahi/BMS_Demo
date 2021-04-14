<?php

namespace App\Http\Controllers;

use App\Import\bulkTricsImport;
use App\Models\tric;
use Illuminate\Http\Request;
//use Maatwebsite\Excel\Excel;
use Excel;
class TricController extends Controller
{


    public function index()
    {
        $data= tric::orderBy('id','DESC')->get();
        return view('trics',compact('data'));
    }

    public function show(tric $tric)
    {
//        return view('trics', ['name'=> request('name')]);
//        return view('trics', ['tric'=> tric::where('title',$tric)->first()]);

        return view('tricsShow', compact('tric'));
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'select_file'  => 'required|mimes:xls,xlsx'
        ]);

        $data=$request->all();

        $file = $request->file('select_file');

        Excel::import(new bulkTricsImport($data), $file);
        return back()->with('success', 'successfully Imported.');
    }

    public function update(tric $tric)
    {

        $tric->update(request()->validate([
        'chapterNumber'=> 'required',
            'title'=> 'required',
            'b1h'=> 'required',
            'b1'=> 'required',
            'imageOne'=> 'required',
            'imageTwo'=> 'required',
    ]));
        return redirect('/check')->with('success', 'successfully Updated.');
    }

    public function destroy(tric $tric)
    {
        $tric->delete();
        return redirect('/check')->with('success', 'successfully Deleted.');
    }

}
