<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Add Admin</title>
</head>
<body>
<h1>Add admin to {{ $system->acronym }}</h1>

<form action="{{ URL::route('mailbox') }}" method="post">
    {{ csrf_field() }}

    <input type="hidden" name="command" value="add_system_administrator">
    <input type="hidden" name="system_uuid" value="{{ $system->uuid }}">

    <label for="">Admin EDIPNID:</label>
    <input type="text" name="edipnid">
    <br>
    <label for="">Admin Type:</label>
    <select name="type" id="">
        <option value="owner">Owner</option>
        <option value="preparer">Preparer</option>
    </select>
    <br>
    <button>Add</button>

</form>
</body>
</html>