<!DOCTYPE html>
<html lang="en">
<head>
    <title>KPS</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/app.css')}}" rel="stylesheet">
    <script src="{{ asset('assets/js/apps.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.6.3.min.js') }}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}" ></script>

</head>
<body>
        
       
            @yield('content')
       
<script>
    
$( document ).ready(function() {
    $(".alert").fadeTo(2000, 500).slideUp(500, function(){
        $(".alert").slideUp(500);
    });
    
});


function delfunction(id) {
    if(confirm("Are You Sure You want to delete")){
     

     document.getElementById('eea'+ id ).submit();
    }
}

function delfunctionusers(id) {
    if(confirm("Are You Sure You want to delete")){
     

     document.getElementById('eea'+ id ).submit();
    }
}



$(document).ready(function(){
  $("#filterInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".table tbody tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});


 


</script>
    
</body>
</html>