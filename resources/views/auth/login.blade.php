<!DOCTYPE html>
<html>
<head>
    <title>Test Login</title>
</head>
<body>

<h1>LOGIN BERHASIL DITAMPILKAN</h1>

<form method="POST" action="{{ route('login') }}">
    @csrf

    <input type="email" name="email" placeholder="Email">
    <br><br>

    <input type="password" name="password" placeholder="Password">
    <br><br>

    <button type="submit">LOGIN</button>
</form>

</body>
</html>