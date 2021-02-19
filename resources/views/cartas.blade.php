<!DOCTYPE html>
<html>
<head>
    <title>Laravel 7 Ajax Request example</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
  
    <div class="container">
        <h1>Laravel 7 Ajax Request example</h1>
  
        <form >
  
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="nombre" class="form-control" placeholder="Name" required="">
            </div>
  
            <div class="form-group">
                <label>descripcion:</label>
                <input type="text" name="descripcion" class="form-control" placeholder="descripcion" required="">
            </div>
   
            <div class="form-group">
                <strong>Coleccion:</strong>
                <input type="email" name="coleccion" class="form-control" placeholder="Email" required="">
            </div>

            <div class="form-group">
                <strong>coleccion id:</strong>
                <input type="text" name="colections_id" class="form-control" placeholder="Email" required="">
            </div>
            
   
            <div class="form-group">
                <button class="btn btn-success btn-submit">Submit</button>
                  <button onclick="location.href = 'http://localhost/proyectos/marketfinal/public/crearColeccion'">Crear Cartas</button>
                  <button onclick="location.href = 'http://localhost/proyectos/marketfinal/public/crearAdmin'">Crear admistrador</button>
                  <button onclick="location.href = 'http://localhost/proyectos/marketfinal/public/newPassword'">nueva contraseña</button>
            </div>

  
        </form>
    </div>
  
</body>
<script type="text/javascript">
   
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   
    $(".btn-submit").click(function(e){
  
        e.preventDefault();
   
        var nombre = $("input[name=nombre]").val();
        var descripcion = $("input[name=descripcion]").val();
        var coleccion = $("input[name=coleccion]").val();
        var colections_id = $("input[name=colections_id]").val();

        var arr = {nombre:nombre, descripcion:descripcion, coleccion:coleccion, colections_id:colections_id}
   
        $.ajax({
           type:'POST',
           url:"{{ route('crearCarta') }}",
           data: JSON.stringify(arr),
           contentType: 'application/json; charset=utf-8',
           dataType: 'json',
            async: false,

           //data:{name:name, password:password, email:email},
           success:function(data){
              alert(data.success);
           }
        });
  
    });
</script>
   
</html>