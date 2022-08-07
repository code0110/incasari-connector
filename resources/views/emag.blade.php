@extends('core/base::layouts.master')

@section('content')
    <div class="card-body">
        <h1 class="page-title">Incasari Emag</h1>            
            <br>
            <form action="{{ route('incasari-connector.import-emag') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import incasari</button>            
            </form>
  
            <table class="table table-striped table-bordered" id="emag-incasari" style="width:100%">
                <tr>
                    <th colspan="2">
                        Lista produse 
                        <a class="btn btn-success float-end" href="{{ route('incasari-connector.emag-clear') }}">Sterge</a>                      
                    </th>
                    
                    <th colspan="2">                        
                        <a class="btn btn-danger float-end" href="{{ route('incasari-connector.emag-clear') }}">Sterge</a>
                    </th>
                </tr>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID Comanda</th>
                    <th scope="col">Nume Client</th>
                    <th scope="col">Suma</th>
                </tr>
                @foreach($emag as $e)
                <tr>
                    <td> {{$e->id}}</td>
                    <td>
                        {{$e->id_comanda}}
                    </td>
                    <td> {{$e->nume_client}}</td>
                    <td> {{$e->suma}}</td>
                 
                </tr>
                @endforeach
            </table>
            {{$emag->links()}}    


        </div>
@stop
