@extends('core/base::layouts.master')

@section('content')
    <div class="card-body">
        <h1 class="page-title">Incasate Neomanager</h1>            
            <br>
            <form action="{{ route('incasari-connector.import-neomanager') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import incasari</button>            
            </form>
  
            <table class="table table-striped table-bordered" id="neomanager-incasari" style="width:100%">
                <tr>
                    <th colspan="2">
                        Lista produse                        
                    </th>                    
                    <th colspan="2">                        
                        <a class="btn btn-danger float-end" href="{{ route('incasari-connector.neomanager-clear') }}">Sterge</a>
                    </th>
                </tr>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID Comanda</th>
                    <th scope="col">Nume Client</th>
                    <th scope="col">Suma</th>
                </tr>
                @foreach($neomanager as $n)
                <tr>
                    <td> {{$n->id}}</td>
                    <td>
                        {{$n->id_comanda}}
                    </td>
                    <td> {{$n->nume_client}}</td>
                    <td> {{$n->suma}}</td>
                 
                </tr>
                @endforeach
            </table>
            {{$neomanager->links()}}    


        </div>
@stop
