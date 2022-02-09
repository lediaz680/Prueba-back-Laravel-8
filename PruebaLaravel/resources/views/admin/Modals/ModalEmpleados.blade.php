
<!-- Modal -->
<div class="modal fade" id="modalRegistroEmpleados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nuevo Registro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('adminEmployesStore')}}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                  <label>Primer Nombre</label>
                  <input type="text" class="form-control" name="FirstName" id="FirstName" >
                </div>
                <div class="form-group">
                    <label>Segundo Nombre</label>
                    <input type="text" class="form-control" name="LastName" id="LastName" >
                  </div>
                 <div class="form-group">
                    <select name="Company_id" class="form-control">
                        <option value="">--Seleccione una Compañia--</option>
                        @foreach ($companies as $item)
                            <option value="{{$item->id}}">{{$item->Name}}</option>
                        @endforeach    
                    </select>     
                </div> 
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" name="Email" id="Email">
                </div>
                <div class="form-group">
                  <label>Telefono</label>
                  <input type="text" class="form-control" name="Phone" id="Phone">
                </div>
               
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
      </form>
  
      </div>
    </div>
  </div>

