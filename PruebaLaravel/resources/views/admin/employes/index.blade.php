@extends('adminlte::page')
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
@section('title', 'Panel de control - Administracion Compañias')
@include('admin/Modals/ModalEmpleados')

@section('content_header')
    <h1>Panel de Control</h1>
@stop

@section('content')
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    {{ session('success') }}
</div>
@elseif(session('error'))
<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    {{ session('error') }}
</div>
@elseif(session('successDelete'))
<div class="alert alert-info alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    {{ session('successDelete') }}
</div>

@endif

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="card">
   
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 ">
                <button class="btn btn-sm btn-primary mt-2 mb-2 py-1" onclick="AbrirModalEmpleados()"><i class="fas fa-plus"></i> Agregar Nuevo</button>
            </div>
        </div>
        <table class="table table-bordered table-sm" id="myTableEmpleados" >
            <thead>
                <th>Primer Nombre</th>
                <th>Segundo Nombre</th>
                <th>Compañia</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </thead>
            <tbody>
              @foreach ($employes as $employe)
                  <tr>
                      <td>{{$employe->FirstName}}</td>
                      <td>{{$employe->LastName}}</td>
                      <td>{{$employe->Name}}</td>
                      <td>{{$employe->Email}}</td>
                      <td>{{$employe->Phone}}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('adminEmployesEdit',$employe->id) }}" class="btn  btn-sm"><i class="fas fa-edit"></i></a>
                              
                                <form action="{{route('adminEmployesDelete', $employe->id)}}" method="POST" id="EliminarForm" >
                                    @csrf
                                    @method('delete')
                                    <button type="submit" 
                                    onclick="return confirm('Estas Seguro de elminar el registro?');" 
                                    id ="btnEliminar" class="btn btn-sm "><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                       
                  </tr>
              @endforeach
            </tbody>
        </table> 
    </div>
</div>
 

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
    <script> 
    function AbrirModalEmpleados()
        {
            $('#modalRegistroEmpleados').modal('show');
        }
        $(document).ready( function () {
            $('#myTableEmpleados').DataTable();
        } );
        
       
    </script>

@stop