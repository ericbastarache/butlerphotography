<?php

namespace App\Http\Controllers;

use App\Prints;
use Illuminate\Http\Request;

class PrintsController extends Controller
{
    //
    public function index ()
    {
    	$prints = Prints::paginate(15);
    	return view('admin.prints.index', compact('prints'));
    }

    public function showCreate ()
    {
    	return view('admin.prints.create');
    }

    public function createPrint (Request $request)
    {
    	$print = new Prints();
    	$print->title = stripslashes($request['print-title']);
    	$print->description = stripslashes($request['print-description']);
    	$print->category = stripslashes($request['print-category']);
    	$url = $request->file('print-url')->move(public_path('images/uploads'), $request->file('print-url')->getClientOriginalName());
        $print->url = substr(public_path('images/uploads') . '/' . $request->file('print-url')->getClientOriginalName(), 37, strlen($url));
        $print->quantity = stripslashes($request['print-quantity']);
    	$print->price = stripslashes($request['print-price']);
    	$print->save();
        return redirect()->route('admin.createPrint')->with('success', 'Added print to store');
    }

    public function showUpdate ($id)
    {
        $prints = Prints::where('id', $id)->get();
        return view('admin.prints.update', compact('prints'));
    }

    public function updatePrint (Request $request)
    {
        $id = $request['id'];
        $print = Prints::find($id);
        $print->title = stripslashes($request['print-title']);
        $print->description = stripslashes($request['print-description']);
        $print->category = stripslashes($request['print-category']);
        $print->quantity = stripslashes($request['print-quantity']);
        $url = $request->file('print-url')->move(public_path('images/uploads'), $request->file('print-url')->getClientOriginalName());
        $print->url = substr(public_path('images/uploads') . '/' . $request->file('print-url')->getClientOriginalName(), 37, strlen($url));
        $print->quantity = stripslashes($request['print-quantity']);
        $print->price = stripslashes($request['print-price']);
        $print-save();
        return redirect()->route('admin.listPrints')->with('success', 'Successfully updated print');
    }

    public function deletePrints ($id)
    {
    	$print = Prints::find($id);
        if($print) {
            $print->delete();
            return redirect()->route('admin.listPrints')->with('deleted', 'Print deleted');
        }
    	return redirect()->route('admin.listPrints')->with('error', 'Print could not be deleted');
    }
}
