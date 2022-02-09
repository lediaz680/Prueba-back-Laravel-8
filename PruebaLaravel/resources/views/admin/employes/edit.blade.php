@extends('adminlte::page')

@section('title', 'Panel de control - Administracion Compañias')
@section('content_header')
    <h1>Panel de Control</h1>
@stop

@section('content')
    <div class="card">
   <div class="card-body">
  
    @if (session('successUpdate'))
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        {{ session('successUpdate') }}
    </div>
    @elseif(session('errorUpdate'))
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        {{ session('errorUpdate') }}
    </div>
  
    @endif
    <a href="{{route('adminEmployes')}}" class="btn btn-link">Volver</a>
    <form action="{{route('adminEmployesUpdate', $employe->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

          <div class="form-group">
            <label>Primer Nombre</label>
            <input type="text" class="form-control" name="FirstName" id="FirstName" value="{{$employe->FirstName}}">
          </div>
          <div class="form-group">
              <label>Segundo Nombre</label>
              <input type="text" class="form-control" name="LastName" id="LastName"  value="{{$employe->LastName}}">
            </div>
           <div class="form-group">
              <select name="Company_id" class="form-control">
                  <option value="">--Seleccione una Compañia--</option>
                  @foreach ($companies as $item)
                    @if ($employe->Company_id == $item->id)
                        <option selected value="{{$item->id}}">{{$item->Name}}</option>
                    @else 
                    <option  value="{{$item->id}}">{{$item->Name}}</option>
                     @endif
                
                  @endforeach    
              </select>     
          </div> 
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="Email" id="Email"  value="{{$employe->Email}}">
          </div>
          <div class="form-group">
            <label>Telefono</label>
            <input type="text" class="form-control" name="Phone" id="Phone"  value="{{$employe->Phone}}">
          </div>
         
    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
</form>


   </div>
    </div>


   

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

