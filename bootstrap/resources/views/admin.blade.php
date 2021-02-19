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
                <label>Nombre:</label>
                <input type="text" name="nombre" class="form-control" placeholder="Name" required="">
            </div>
  
            <div class="form-group">
                <label>email:</label>
                <input type="email" name="email" class="form-control" placeholder="email" required="">
            </div>
   
            <div class="form-group">
                <strong>Contraseña:</strong>
                <input type="password" name="password" class="form-control" placeholder="Password" required="">
            </div>

           
            
   
            <div class="form-group">
                <button class="btn btn-success btn-submit">Submit</button>
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
        var email = $("input[name=email]").val();
        var password = $("input[name=password]").val();
      

        var arr = {nombre:nombre, email:email,password:password, rol_admin:"administrador"}
   
        $.ajax({
           type:'POST',
           url:"{{ route('crearAdmin') }}",
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
    var request = $.ajax({
  method: "GET",
  url: "http://...../"
});
</script>
   
</html>