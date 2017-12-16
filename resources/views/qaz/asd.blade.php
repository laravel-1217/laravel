<h1>Привет, {{$name}}!</h1>
<h1>Мне {{$age}} лет!</h1>

<form method="POST" action="">
    {{ csrf_field() }}
    Login: <input type="text" name="login"><br>
    Password: <input type="text" name="password">
    <input type="submit" value="Go!">
</form>