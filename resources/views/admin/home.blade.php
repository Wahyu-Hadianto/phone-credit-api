<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap/app.css') }}">
    <title>Api Documentation</title>
</head>
<body>
    <div id="home">
        <nav class="navbar navbar-expand-lg navbar-light bg-primary justify-content-center text-light">
            <h1>Api Documentation</h1>
        </nav>
        <div>
            <h3>Guest</h3>
            <ul class="list-group">
                <li class="list-group-item row">
                    <span class="col col-1">Method</span>
                    <span class="col col-3">Url</span>
                </li>
                <li class="list-group-item row">
                    <span class="col col-1 badge bg-primary">
                        GET
                    </span>
                    <span class="col col-3">
                        http://192.168.43.148/api/products
                    </span>
                </li>
                <li class="list-group-item">A third item</li>
                <li class="list-group-item">A fourth item</li>
                <li class="list-group-item">And a fifth one</li>
              </ul>
        </div>
       </div>
       <script js="{{ asset('bootstrap/app.js')}}"></script>
</body>
</html>
   
