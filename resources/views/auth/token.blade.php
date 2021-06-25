<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Cek Token</h1>
    <form action="{{ url('/token')}}" method="POST">
        @csrf
        <label for="">ID user</label>
        <input type="number" name="id">
        <br>
        <button type="submit">Cek</button>
    </form>
</body>
</html>