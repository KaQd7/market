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
                <label>Nombre venta:</label>
                <input type="text" name="nombre_venta" class="form-control" placeholder="nombre_venta" required="">
            </div>
  
            
            <div class="form-group">
                <button class="btn btn-success btn-submit">Submit</button>
            </div>
  
        </form>


        <div class="container">

            <table class="display" cellspacing="0" width="100%" >
                <thead>
                    
                    <tr >
                        
                        <th>Name</th>
                        <th>quantity</th>
                        <th>price</th>

                    </tr>


                </thead>
                <tbody id="myData">
                    

                </tbody>


            </table>

        </div>
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

        var arr = {nombre_venta:nombre_venta};
   
        $.ajax({
           type:'POST',
           url:"{{ route('listaCompra') }}",
           data: JSON.stringify(arr),
           contentType: 'text/plain',
            dataType: 'json',
            async: false,



           //data:{name:name, password:password, email:email},
           success:function(data, textStatus, jqXHR){
              alert(data.success);

              if (data){
                
                console.log(data);

                let table = document.querySelector('#myData');

                table.innerHTML = '';

                for(let item of data){
                    table.innerHTML += `
                        <tr>
                            <td>${item.name}</td> 
                            <td>${item.quantity}</td> 
                            <td>${item.price}</td> 
                        </tr>
                    `

                }


            }else{
                $('.error').slideDown('slow');
            }
               
           }
        });
  
    });
</script>
   
</html>