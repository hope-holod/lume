@extends('layout')

@section('content')

    @if ($errors->any())
        <div style="
            background: #fce8e6;
            border-left: 4px solid var(--choco);
            padding: 12px 16px;
            border-radius: 12px;
            margin-bottom: 20px;
            color: var(--choco);
        ">
            <ul style="margin: 0; padding-left: 18px;">
                @foreach ($errors->all() as $error)
                    <li style="font-size: 14px;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="auth-box" style="max-width:600px; margin: 0 auto; border-radius:30px;">

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h2 class="auth-h2 " style="text-align:center;">Авторизация</h2>
            {{-- Email --}}
            <label class="auth-label" for="email">Email</label>
            <input id="email" class="auth-input" type="email" name="email" value="{{ old('email') }}" required autofocus>

            {{-- Password --}}
            <label class="auth-label mt-3" for="password">Пароль</label>
            <div  class="auth-view" style="position: relative;">
                <input id="password"
                    class="auth-input"
                    type="password"
                    name="password"
                    required>

                <button type="button"
                    onclick="togglePassword('password', this)"
                    style="
                        position:absolute;
                        right: 12px;
                        top: 50%;
                        transform: translateY(-50%);
                        background: none;
                        border: none;
                        padding: 0 5px;
                        margin: 0;
                        font-size: 12px;
                        color: var(--choco);
                        cursor: pointer;
                        outline: none;
                        box-shadow: none;
                    "
                    onmousedown="this.style.background='transparent'"
                    onfocus="this.style.outline='none'">
                Показать
            </button>
            </div>

            {{-- Remember --}}
            <label class="auth-label mt-3" style="display:flex; align-items:center; gap:8px;">
                <input type="checkbox" name="remember">
                Запомнить меня
            </label>

            <button class="auth-btn mt-4">
                Войти
            </button>

            <p class="mt-3" style="text-align:center;">
                Нет аккаунта?
                <a class="auth-link" href="{{ route('register') }}">Зарегистрироваться</a>
            </p>

            @if (Route::has('password.request'))
                <p class="mt-2" style="text-align:center;">
                    <a class="auth-link" href="{{ route('password.request') }}">
                        Забыли пароль?
                    </a>
                </p>
            @endif

        </form>

    </div>

@endsection
