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
                <input type="text" name="nombre_venta" class="form-control" placeholder="Name" required="">
            </div>
  
            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="cantidad" class="form-control" placeholder="Password" required="">
            </div>
   
            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="precio" class="form-control" placeholder="Email" required="">
            </div>

            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="cards_id" class="form-control" placeholder="Email" required="">
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
   
        var nombre_venta = $("input[name=nombre_venta]").val();
        var cantidad = $("input[name=cantidad]").val();
        var precio = $("input[name=precio]").val();
        var cards_id = $("input[name=cards_id]").val();

        var arr = {nombre_venta:nombre_venta, cantidad:cantidad, precio:precio, cards_id:cards_id}
   
        $.ajax({
           type:'POST',
           url:"{{ route('createventa') }}",
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