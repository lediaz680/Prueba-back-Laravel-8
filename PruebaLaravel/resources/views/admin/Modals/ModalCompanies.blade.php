

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="{{route('adminCompaniesStore')}}" method="POST" enctype="multipart/form-data">
            @csrf
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="Name" id="Name" value="{{old('Name')}}" >
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="Email" id="Email"  value="{{old('Email')}}">
              </div>
              <div class="form-group">
                <label>Logo</label>
                <input type="file" accept="image/*" class="form-control" name="Logo" id="Logo">
              </div>
              <div>
                <img id="ImagenSeleccionada" width="35px" height="35px">
              </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
      </div>
    </form>

    </div>
  </div>
</div>
