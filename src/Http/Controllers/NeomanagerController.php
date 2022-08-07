<?php

namespace Botble\IncasariConnector\Http\Controllers;

use Botble\IncasariConnector\Http\Models\Neomanager;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Botble\IncasariConnector\Http\Imports\NeomanagerImport;
use Illuminate\Support\Facades\Storage;
use Assets;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Redirect;


class NeomanagerController extends BaseController
{
	public function index(Request $request)
    {        
            $neomanager = Neomanager::orderBy('id', 'desc')->paginate(20);
        
        return view('plugins/incasari-connector::neomanager', ['neomanager' => $neomanager]);
    }    

    public function import()
    {
        Excel::import(new NeomanagerImport, request()->file('file'));

        return Redirect::back()->with('success', 'Datele au fost importate cu succes!');
    }   
    
    public function destroy()
    {
        Neomanager::truncate();

        return Redirect::back()->with('status','Baza de date a fost curatata cu succes!');
    }

}