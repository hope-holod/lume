
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

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <h2 style="text-align:center; margin-bottom:20px;">Новый пароль</h2>

            <label class="auth-label" for="email">Email</label>
            <input id="email" class="auth-input" type="email" name="email" value="{{ old('email', $request->email) }}" required>

            <label class="auth-label mt-3" for="password">Новый пароль</label>
            <input id="password" class="auth-input" type="password" name="password" required>

            <label class="auth-label mt-3" for="password_confirmation">Подтверждение</label>
            <input id="password_confirmation" class="auth-input" type="password" name="password_confirmation" required>

            <button class="auth-btn mt-4">
                Сохранить пароль
            </button>

        </form>

    </div>

@endsection
