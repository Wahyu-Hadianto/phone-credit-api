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
        <div class="container">
            <h3>Public Api</h3>
            <ul class="list-group mb-3">
                <p>send all data products</p>
                <li class="list-group-item row">
                    <span class="col col-1 badge bg-primary">
                        GET
                    </span>
                    <span class="col col-3">
                        {{ env('APP_URL')}}/products
                    </span>
                </li>
              </ul>
              <h3 class="mb-3">Optional Parameter</h3>
              <table class="table mb-3">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                  </tr>
                </tbody>
              </table>
        </div>
       </div>
       <script js="{{ asset('bootstrap/app.js')}}"></script>
</body>
</html>
   
