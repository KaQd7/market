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
  
        <form action="" id="formlg" >
  
           
  
            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" class="form-control" placeholder="Password" required="">
            </div>
   
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" class="form-control" placeholder="Email" required="">
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
   
    $(document).on('submit','#formlg', function(event){
        event.preventDefault();    
    
   
       
        var password = $("input[name=password]").val();
        var email = $("input[name=email]").val();

        var arr = { password:password, email:email};
   
        $.ajax({
           type:'POST',
           url:"{{ route('login') }}",
           data: JSON.stringify(arr),
           contentType: 'application/json; charset=utf-8',
            dataType: 'json',
            async: false,

          
           success:function(data){
              alert(data.success);
              //location.href = 'http://localhost/cartas_magic/public/crearColeccion';

              if (data){

                console.log(data)

                if (data.permisos == "administrador"){

                    location.href = 'http://localhost/proyectos/marketfinal/public/crearColeccion';

                }else if (!data.permisos) {
                    console.log(401);
                    location.reload();
                }
                    //echo "No tienes permisos";

            }else{
                $('.error').slideDown('slow');
            }

           }

        })


        .fail(function(resp){
            console.log(resp.responseText);
        })

        .always(function(){
            console.log("complete");
        })

  
    });
</script>
   
</html>