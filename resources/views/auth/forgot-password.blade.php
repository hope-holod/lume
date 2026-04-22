

@extends('layout')

@section('content')

    @if (session('status'))
        <div style="
            background: #e8f5e9;
            border-left: 4px solid var(--choco);
            padding: 12px 16px;
            border-radius: 12px;
            margin-bottom: 20px;
            color: var(--choco);
        ">
            {{ session('status') }}
        </div>
    @endif

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

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <h2 style="text-align:center; margin-bottom:20px;">Восстановление пароля</h2>

            <label class="auth-label" for="email">Email</label>
            <input id="email" class="auth-input" type="email" name="email" value="{{ old('email') }}" required autofocus>

            <button class="auth-btn mt-4">
                Отправить ссылку
            </button>

            <p class="mt-3" style="text-align:center;">
                <a class="auth-link" href="{{ route('login') }}">Вернуться ко входу</a>
            </p>

        </form>

    </div>

@endsection
