<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
</head>
<body>
    <!--print for blade -->
    {{'hello'}}

   <h1>Home page</h1> 
   <a href="{{route('About')}}">About</a>
   <a href="<?php echo route('sign_in')?>">Login</a>
   <a href="<?php echo route('sign_up')?>">Registration</a>
   <a href="/admin">Dashboard</a>
</body>
</html>