
@extends('layout')

@section('content')

<div class="auth-box" style="max-width:600px; margin: 0 auto; border-radius:30px;">

    <h2 style="text-align:center; margin-bottom:20px;">Подтверждение email</h2>

    <p style="text-align:center;">
        Мы отправили письмо с подтверждением на ваш email.
    </p>

    @if (session('status') == 'verification-link-sent')
        <div style="
            background: #e8f5e9;
            border-left: 4px solid var(--choco);
            padding: 12px 16px;
            border-radius: 12px;
            margin-top: 20px;
            color: var(--choco);
        ">
            Новая ссылка отправлена.
        </div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}" style="margin-top:20px;">
        @csrf
        <button class="auth-btn">Отправить ещё раз</button>
    </form>

    <form method="POST" action="{{ route('logout') }}" style="margin-top:10px;">
        @csrf
        <button class="auth-btn" style="background:#aaa;">Выйти</button>
    </form>

</div>

@endsection
