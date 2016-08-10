<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Create new role</title>
</head>
<body>

    <h1>Create Role in {{ $system->name }}</h1>

    <form action="{{ URL::route('mailbox') }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="command" value="CreateSystemRole">
        <input type="hidden" name="system_uuid" value="{{ $system->uuid }}">
        <input type="hidden" name="role_uuid" value="{{ \App\Roles\ValueObjects\RoleId::generate() }}">

        <label for="">Role Name:</label>
        <input type="text" name="name" value="{{ request()->old('name') }}">

        <button>Add Role</button>
    </form>

</body>
</html>