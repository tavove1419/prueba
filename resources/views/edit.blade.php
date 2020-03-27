<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Editar Personas </title>
     
  </head>
  <body>
    <div class="container">
        
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div><br />
      @endif
     
    <form method="post" action="{{route('registries.update', $usuarios->iduser)}}" id="formRegistry">
    @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
          <div class="form-group col-xs-12 col-sm-6 col-md-6">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" name="user_name" value="{{$usuarios->user_name}}">
          </div>
          <div class="form-group col-xs-12 col-sm-6 col-md-6">
            <label for="name">Direccion:</label>
            <input type="text" class="form-control" name="user_dir" value="{{$usuarios->user_dir}}">
          </div>
        </div>
         <div class="row">
          <div class="form-group col-xs-12 col-sm-6 col-md-6">
            <label for="name">Telefono:</label>
            <input type="text" class="form-control" name="user_phone" value="{{$usuarios->user_phone}}">
          </div>
          <div class="form-group col-xs-12 col-sm-6 col-md-6">
            <label for="name">Email:</label>
            <input type="email" class="form-control" name="user_email" value="{{$usuarios->user_email}}">
          </div>
        </div>
        
        <div class="row">
          
          <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-success">Actualizar</button>
          </div>
        </div>
    </form>
    
    </div>
        <div id="toast-container" class="toast-top-right">   
    </div>
  </body>
</html>