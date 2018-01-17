<form method="POST" action="/ormPost">
    {{ csrf_field() }}
    <input type="text" name="id" value="22"><br>
    Name: <input type="text" name="name"><br>
    Surname: <input type="text" name="surname"><br>
    Age: <input type="text" name="age"><br>
    Birthdate: <input type="text" name="birthdate"><br>
    Notes: <input type="text" name="notes"><br>
    <input type="submit" value="Post!"><br>
</form>