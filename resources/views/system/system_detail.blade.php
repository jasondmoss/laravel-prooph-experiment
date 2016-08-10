<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{ $system->name }}</title>
</head>
<body>

<h1>System Detail</h1>
<h2>{{ $system->name }}</h2>

<p>
    UUID: {{ $system->uuid }}<br>
    Acronym: {{ $system->acronym }}
</p>

<hr>

<a href="{{ URL::to('systems/'.$system->uuid.'/edit') }}">Edit {{ $system->acronym }}</a>

<hr>

<h3>Roles</h3>
<ul>
    @foreach($system->roles as $role)
        <li>{{ $role->name }} ({{ $role->uuid }})</li>
    @endforeach
</ul>
<a href="{{ URL::route('role:create', $system->uuid) }}">Create Role</a>
<hr>

<h3>Administrators</h3>
<ul>
    @foreach($system->admins as $admin)
        <li>{{ $admin->edipnid }} ({{ $admin->type }})</li>
    @endforeach
</ul>

<p>
    <a href="{{ URL::to('systems/'.$system->uuid.'/admins/add') }}">Add Administrator</a>
</p>

<hr>

<a href="/systems">Return to systems index</a>

</body>
</html>