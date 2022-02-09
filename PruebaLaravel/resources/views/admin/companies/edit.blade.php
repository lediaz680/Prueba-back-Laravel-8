@extends('adminlte::page')

@section('title', 'Panel de control - Administracion Compañias')
@section('content_header')
    <h1>Panel de Control</h1>
@stop

@section('content')
    <div class="card">
   <div class="card-body">
  
    @if (session('successUpdate'))
    <div class="alert alert-success">
        {{ session('successUpdate') }}
    </div>
    @elseif(session('errorUpdate'))
    <div class="alert alert-danger">
        {{ session('errorUpdate') }}
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
    <a href="{{route('adminCompanies')}}" class="btn btn-link">Volver</a>
        <form action="{{route('adminCompaniesUpdate',$company->id)}}" method="POST" enctype="multipart/form-data">
            @csrf 
            @method('PUT')
            {{-- <input type="hidden" value="{{$company->id}}" name="idCompany"> --}}

            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" name="Name" id="Name" value="{{$company->Name}}" >
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" name="Email" id="Email" value="{{$company->Email}}">
            </div>
            <div class="form-group">
              <label>Logo</label>
              <input type="file" accept="image/*" class="form-control" name="Logo" id="Logo" value="{{$company->Logo}}">
            </div>
            <div>
                <div class="form-group">
                    <label>Logo Seleccionado</label>
                    <hr>
                    <img src="{{asset('storage').'/'.$company->Logo}}" width="150px">
                </div>
            </div>
      <button type="submit" class="btn btn-primary">Guardar Cambios</button>
  </form>
   </div>
    </div>


   

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> 
        $(document).ready( function(e){
            $('#Logo').change(function(){
                let reader = new FileReader();
                reader.onload = (e) =>{
                    $('#ImagenSeleccionada').attr('src', e.target.result)
                }
                reader.readAsDataURL(this.files[0])
            })
        })
    </script>
@stop