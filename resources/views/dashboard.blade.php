@extends('layout')

@section('title', 'Панель управления')

@section('content')
<head>
<style>
.dashboard-container {
    max-width: 900px;
    margin: 60px auto;
    padding: 40px;
    background: var(--beige);
    border-radius: 16px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.08);
}

.page-title {
    font-family: 'Montserrat', sans-serif;
    font-size: 32px;
    font-weight: 600;
    color: var(--choco);
    margin-bottom: 12px;
}

.page-subtitle {
    font-size: 16px;
    color: var(--choco-dark);
    opacity: 0.8;
}
</style>
</head>
<div class="dashboard-container">
    <h1 class="page-title">Добро пожаловать, {{ auth()->user()->name }}!</h1>

    <p class="page-subtitle">
        Это ваша панель управления. Здесь позже появятся заказы, настройки профиля и другие функции.
    </p>
</div>
@endsection

