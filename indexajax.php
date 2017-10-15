<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>api</title>
    <style>
        
    </style>
</head>

<body>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
     

     var name = "Hi";
     var password = "yes";
     var email = "lalala";
     
     $.ajax({
     type: "POST",
     url: 'getDistributor.php',
     data:
     {
        'name' : name,
        'password' : password,
        'email' : email
     },

     success: function(response){
         response = $.parseJSON(response);
         console.log(response);
     }  
    });

    </script>
    
</body>

</html>