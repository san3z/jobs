<html>
    <head>
        <strong>Vacancy</strong> {{ $vacancy->id }}
    </head>

    <body>
        <li>About:</li> {{ $vacancy->about }}
        <li>created_at</li> {{ $vacancy->created_at }}
        <li>updated_at</li> {{ $vacancy->updated_at }}
        <li>relevant</li> {{ $vacancy->relevant }}    
    </body>
</html>