<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>System List</title>
</head>
<body>

<h1>System Listing</h1>

<ul>
    @foreach($systems as $system)
    <li><a href="{{ URL::to('systems/'.$system->uuid) }}">{{ $system->acronym }} - {{ $system->name }}</a></li>
    @endforeach
</ul>
<hr>
<a href="{{ URL::to('systems/create') }}">New System</a>

</body>
</html>