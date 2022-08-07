@extends('core/base::layouts.master')

@section('content')
    <div class="card-body">
        <h1 class="page-title">Diferente / Neincasate</h1>            
  
            <table class="table table-striped table-bordered" id="example" style="width:100%">
                <tr>
                    <th colspan="1">
                        Diferente / Neincasate
                        <a class="btn btn-success float-end" href="{{ route('incasari-connector.mapper') }}">Mapare</a>
                    </th>

                    <th colspan="1">                        
                        <a class="btn btn-warning float-end" href="{{ route('incasari-connector.export') }}">Export product data</a>
                    </th>
                    
                    <th colspan="2">                        
                        <a class="btn btn-danger float-end" href="{{ route('incasari-connector.mapper-clear') }}">Sterge</a>
                    </th>
                </tr>
                <tr>                    
                    <th scope="col">ID Comanda</th>
                    <th scope="col">Nume Client</th>
                    <th scope="col">Suma</th>
                    <th scope="col">#</th>
                </tr>
                @foreach($diferente as $d)
                <tr>                    
                    <td>
                        {{$d->id_comanda}}
                    </td>
                    <td> {{$d->nume_client}}</td>
                    <td> {{$d->suma}}</td>
                    <td> </td>
                 
                </tr>
                @endforeach
            </table>
            {{$diferente->links()}}  


        </div>
@stop
