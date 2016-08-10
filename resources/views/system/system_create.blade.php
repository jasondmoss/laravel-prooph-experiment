<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Create New System</title>
</head>
<body>
<h1>Create New System</h1>

<div>
    @foreach($errors->all() as $error)
        <p style="color: red">{{ $error }}</p>
    @endforeach
</div>

<form action="{{ URL::route('mailbox') }}" method="post">
    <label for="">Acronym</label> <input type="text" name="acronym" size="8" value="{{ request()->old('acronym') }}" /><br/>
    <label for="">Name</label> <input type="text" name="name" value="{{ request()->old('name') }}" /><br/>
    <input type="hidden" name="command" value="register_system">
    <input type="hidden" name="uuid" value="{{ \App\System\ValueObjects\SystemId::generate() }}">
    {{ csrf_field() }}
    <button>Create System</button>
</form>

</body>
</html>