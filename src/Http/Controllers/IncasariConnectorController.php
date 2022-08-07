<?php

namespace Botble\IncasariConnector\Http\Controllers;

use Assets;
use Botble\IncasariConnector\Http\Models\Emag;
use Botble\IncasariConnector\Http\Models\Neomanager;
use Botble\IncasariConnector\Http\Models\Mapper;
use Botble\IncasariConnector\Http\Exports\DiferenteExport;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Redirect;

class IncasariConnectorController extends BaseController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        Assets::addScriptsDirectly('vendor/core/plugins/incasari-connector/js/incasari-connector.js')
            ->addStylesDirectly('vendor/core/plugins/incasari-connector/css/incasari-connector.css');

        page_title()->setTitle(trans('plugins/incasari-connector::incasari-connector.name'));

        $diferente = Mapper::orderBy('id', 'desc')->paginate(20);

        return view('plugins/incasari-connector::diferente', ['diferente' => $diferente]);
    }

    public function mapper()
    {        
        $emag = Emag::orderBy('id', 'desc')->get();
        foreach($emag as $e){
            $neomanager = Neomanager::where('id_comanda', $e->id_comanda)->first();
            if(!$neomanager){
                $insert = [
            'id_comanda' =>$e->id_comanda,
            'nume_client' => $e->nume_client,
            'suma' => $e->suma                
        ];
        Mapper::insert($insert);
            }
        }
               
        return Redirect::back()->with('status','Baza de date a fost curatata cu succes!');
    }

    public function export()
    {
        return Excel::download(new DiferenteExport, 'Neincasate.xlsx');
    }

    public function destroy()
    {
        Mapper::truncate();

        return Redirect::back()->with('status','Baza de date a fost curatata cu succes!');
    }

    
}
