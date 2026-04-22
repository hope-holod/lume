<!-- <x-guest-layout>
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

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>


        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>


        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> -->
<x-guest-layout>

    {{-- Блок ошибок --}}
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

    <div class="auth-box">

        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- Name --}}
            <label class="auth-label" for="name">Имя</label>
            <input id="name" class="auth-input" type="text" name="name" value="{{ old('name') }}" required autofocus>

            {{-- Email --}}
            <label class="auth-label mt-3" for="email">Email</label>
            <input id="email" class="auth-input" type="email" name="email" value="{{ old('email') }}" required>

            {{-- Password --}}
            <label class="auth-label mt-3" for="password">Пароль</label>
            <input id="password" class="auth-input" type="password" name="password" required>

            {{-- Confirm --}}
            <label class="auth-label mt-3" for="password_confirmation">Подтверждение пароля</label>
            <input id="password_confirmation" class="auth-input" type="password" name="password_confirmation" required>

            <button class="auth-btn mt-4">
                Зарегистрироваться
            </button>

            <p class="mt-3" style="text-align:center;">
                Уже есть аккаунт?
                <a class="auth-link" href="{{ route('login') }}">Войти</a>
            </p>

        </form>

    </div>

</x-guest-layout>
