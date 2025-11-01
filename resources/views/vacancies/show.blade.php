<html>
    <style>
        h1 {
            font-size: 120%;
        }

    </style>
    <head>
        <strong>Vacancy</strong> {{ $vacancy->id }}
    </head>

    <body>
        <li>About:</li> {{ $vacancy->about }}
        <li>created_at</li> {{ $vacancy->created_at }}
        <li>updated_at</li> {{ $vacancy->updated_at }}
        <li>relevant</li> {{ $vacancy->relevant }}
           
    </body>
    <h1><a href="/vacancies/{{ $vacancy->id }}/edit">Edit vacancy</a></h1>
    <h1><a href="/vacancies/">Back to Home Page</a></h1>
</html>