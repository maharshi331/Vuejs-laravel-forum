<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

<title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>

    <body>
        <div class="container-fluid" id="app">
            <div class="row">
                <div class="col" >

                    <div id="nav">
                        <nav class="bg-light">
                             <ul>
                                <router-link to="/forum">Forum</router-link>
                                 <router-link to="/home">Home</router-link>
                                 <router-link to="/chat">chat</router-link>

                             </ul>
                        </nav>
                    </div>

                </div>

                   <example-component />

            </div>
                </div>
            </div>


   <script src="{{asset('js/app.js')}}"></script>
    </body>
    <style>
 ul{
    padding: 5px;

    font-size: 18px;

 }
 a{ color: black;
    margin-right: 10px;
    text-decoration: none

 }
 #nav {
    border-bottom: 1px rgb(131, 131, 131) solid;
     margin-bottom:5px
 }
</style>
</html>

