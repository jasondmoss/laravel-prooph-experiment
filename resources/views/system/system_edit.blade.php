<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Edit {{ $system->acronym }}</title>
</head>
<body>

<h1>Edit {{ $system->name }}</h1>

<form action="{{ URL::route('mailbox') }}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="command" value="edit_system">
    <input type="hidden" name="uuid" value="{{ $system->uuid }}">
    <label for="">Name</label> <input type="text" name="name" value="{{ request()->old('name') ?: $system->name }}"><br />
    <button>Edit System</button>
</form>

</body>
</html>