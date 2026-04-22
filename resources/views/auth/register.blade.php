

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

        <form method="POST" action="{{ route('register') }}">
            @csrf
        <h2 class="auth-h2 " style="text-align:center;">Регистрация</h2>
            {{-- Name --}}
            <label class="auth-label" for="name">Имя</label>
            <input id="name" class="auth-input" type="text" name="name" value="{{ old('name') }}" required autofocus>

            {{-- Email --}}
            <label class="auth-label mt-3" for="email">Email</label>
            <input id="email" class="auth-input" type="email" name="email" value="{{ old('email') }}" required>

            {{-- Password --}}
            <!-- <label class="auth-label mt-3" for="password">Пароль</label>
            <input id="password" class="auth-input" type="password" name="password" required>

            <p style="font-size: 12px; color: #7a6a5a; margin-top: 4px;">
                Пароль должен быть не короче 8 символов, содержать заглавную и строчную буквы, цифру и спецсимвол.
            </p> -->

            <!-- @error('password')
                <p style="font-size: 12px; color: #b00020; margin-top: 4px;">
                    {{ $message }}
                </p>
            @enderror -->
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

            <p style="font-size: 12px; color: #7a6a5a; margin-top: 4px;">
                Пароль должен быть не короче 8 символов, содержать заглавную и строчную буквы, цифру и спецсимвол (@$!%*#?&_).
            </p>

            <!-- @error('password')
                <p style="font-size: 12px; color: #b00020; margin-top: 4px;">
                    {{ $message }}
                </p>
            @enderror -->


            {{-- Confirm --}}
            <label class="auth-label mt-3" for="password_confirmation">Подтверждение пароля</label>
            
             <div  class="auth-view" style="position: relative;">
                <input id="password_confirmation" class="auth-input" type="password" name="password_confirmation" required>

                <button type="button"
                    onclick="togglePassword('password_confirmation', this)"
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

            <button class="auth-btn mt-4">
                Зарегистрироваться
            </button>

            <p class="mt-3" style="text-align:center;">
                Уже есть аккаунт?
                <a class="auth-link" href="{{ route('login') }}">Войти</a>
            </p>

        </form>

    </div>

@endsection


