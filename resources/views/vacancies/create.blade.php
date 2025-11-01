<!DOCTYPE html>
<html>
<head>
    <title>Создание вакансии</title>
</head>
<body>
    <h1>Создать новую вакансию</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('vacancies.store') }}">
        @csrf
        
        <div>
            <label for="name">Название вакансии:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        </div>

        <div>
            <label for="about">Описание вакансии:</label>
            <textarea name="about" id="about" rows="5" required>{{ old('about') }}</textarea>
        </div>

        <div>
            <button type="submit">Создать</button>
            <a href="/vacancies">Назад к списку</a>
        </div>
    </form>
</body>
</html>