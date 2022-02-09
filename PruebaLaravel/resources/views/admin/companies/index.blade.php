@extends('adminlte::page')
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
@section('title', 'Panel de control - Administracion Compañias')

@include('admin/Modals/ModalCompanies')
@section('content_header')
    <h1>Panel de Control</h1>
@stop

@section('content')
    <div class="card">
   <div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-sm btn-primary py-1 mb-2 mt-2" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i>Nueva Compañia</button>
        </div>
    </div>
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
    @elseif(session('errorName'))
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        {{ session('errorName') }}
    </div>
    @elseif(session('errorEmail'))
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        {{ session('errorEmail') }}
    </div>
    @elseif(session('errorDelete'))
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        {{ session('errorDelete') }}
    </div>
    @elseif(session('successDelete'))
    <div class="alert alert-success alert-dismissible fade show">
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
   
        <table class="table table-bordered table-sm" id="myTable" >
            <thead>
                <th>Compañia</th>
                <th>Email</th>
                <th>Logo</th>
                <th>Acciones</th>
            </thead>
            <tbody>
              @foreach ($companies as $company)
                  <tr>
                      <td>{{$company->Name}}</td>
                      <td>{{$company->Email}}</td>
                      <td><img src="{{asset('storage').'/'.$company->Logo}}" width="35px"></td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('adminCompaniesEdit',$company->id) }}" class="btn  btn-sm"><i class="fas fa-edit"></i></a>
                                <form action="{{route('adminCompaniesDestroy', $company->id)}}" method="POST" id="EliminarForm" >
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
        {{ $companies->links('pagination::bootstrap-4')}}

   </div>
    </div>


   

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
    <script> 
        $(document).ready( function(e){
            $('#Logo').change(function(){
                let reader = new FileReader();
                reader.onload = (e) =>{
                    $('#ImagenSeleccionada').attr('src', e.target.result)
                }
                reader.readAsDataURL(this.files[0])
            })

            //datatable
            $('#myTable').DataTable();
            //validaciones inputs
          
           
        })

      
     

    </script>
@stop