
<html>
<head>
    <title>Vacancies List</title>
</head>
<body>
    @foreach($vacancies as $vacancy)
    <h1><a href="/vacancies/{{ $vacancy->id }}">
                            {{ $vacancy->name }}
                        </a>
                        </h1>
    <ul>
        <li><strong>ID: </strong> {{ $vacancy->id }}</li>
        <li><strong>About: </strong>{{ $vacancy->about }}</li>
        <li><strong>Created At: </strong>{{ $vacancy->created_at }}</li>
        <li><strong>Updated At: </strong>{{ $vacancy->updated_at }}</li>
        <li><strong>Relevant: </strong>{{ $vacancy->relevant }}</li>
        </ul>
        @endforeach
    
</body>

</html>
