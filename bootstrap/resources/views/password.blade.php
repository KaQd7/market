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
                <input type="text" name="email" class="form-control" placeholder="Name" required="">
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
   
        var email = $("input[name=email]").val();
        

        var arr = {email:email}
   
        $.ajax({
           type:'POST',
           url:"{{ route('newPassword') }}",
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