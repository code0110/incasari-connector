<?php

namespace Botble\IncasariConnector\Http\Controllers;

use Assets;
use Redirect;
use Botble\IncasariConnector\Http\Models\Emag;
use Botble\IncasariConnector\Http\Imports\EmagImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;


class EmagController extends BaseController
{      

    public function index(Request $request)
    {
        if($request->search) {
            $emag = Emag::where('id_comanda', 'LIKE', '%' . $request->search . '%')->orderBy('id', 'desc')->paginate(10);
        }else{
            $emag = Emag::orderBy('id', 'desc')->paginate(20);
        }
        return view('plugins/incasari-connector::emag', ['emag' => $emag]);
    }    

    public function import()
    {
        Excel::import(new EmagImport, request()->file('file'));

        return Redirect::back()->with('success', 'Import realizat cu succes!');
    }

    public function destroy()
    {
        Emag::truncate();
        
        return Redirect::back()->with('status','Baza de date a fost curatata cu succes!');
    }  
    
    
}
