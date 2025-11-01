<!DOCTYPE html>
<html>
<head>
    <title>Редактирование вакансии</title>
</head>
<body>
    <h1>Редактировать вакансию</h1>

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

    @if (session('error'))
        <div style="color: red;">
            {{ session('error') }}
        </div>
    @endif

    @php
        // Безопасное получение ID вакансии
        $vacancyId = is_object($vacancy) ? $vacancy->id : $vacancy;
    @endphp

    <form method="POST" action="{{ route('vacancies.update', $vacancyId) }}">
        @csrf
        @method('PUT')
        
        <div>
            <label for="name">Название вакансии:</label>
            <input type="text" name="name" id="name" 
                   value="{{ old('name', is_object($vacancy) ? $vacancy->name : '') }}" required>
        </div>

        <div>
            <label for="about">Описание вакансии:</label>
            <textarea name="about" id="about" rows="5" required>{{ old('about', is_object($vacancy) ? $vacancy->about : '') }}</textarea>
        </div>

        <div>
            <button type="submit">Сохранить изменения</button>
            <a href="/vacancies">Отмена</a>
        </div>
    </form>
</body>
</html>