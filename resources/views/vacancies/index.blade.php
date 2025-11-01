<!DOCTYPE html>
<html>
<head>
    <title>Список вакансий</title>
</head>
<body>
    <h1>Все вакансии</h1>

    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <a href="/vacancies/create">Создать новую вакансию</a>

    @if ($vacancies->count() > 0)
        <ul style="list-style: none; padding: 0;">
            @foreach ($vacancies as $vacancy)
                <li style="border: 1px solid #ccc; margin: 10px 0; padding: 10px; position: relative;">
                    
                    <form action="{{ route('vacancies.destroy', $vacancy) }}" method="POST" style="position: absolute; top: 5px; right: 5px;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="border: none; background: none; cursor: pointer; font-size: 18px; color: red;" 
                                onclick="return confirm('Вы уверены, что хотите удалить эту вакансию?')">
                            ×
                        </button>
                    </form>

                    <h3><a href="vacancies/{{ $vacancy->id }}">{{ $vacancy->name }}</a></h3>
                    <p>{{ $vacancy->about }}</p>
                    <small>Создано: {{ $vacancy->created_at->format('d.m.Y H:i') }}</small>
                    <small>ID: {{ $vacancy->id }}</small>
                </li>
            @endforeach
        </ul>
    @else
        <p>Вакансий пока нет.</p>
    @endif
</body>
</html>