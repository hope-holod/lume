<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Lume — магазин освещения</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Montserrat+Alternates:wght@600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/svg" href="/">
    <style>
        :root {
            --beige: #fef9f2ff;
            --white: #FFFFFF;
            --black: #000000;
            --choco: #4A2F27;
            --choco-dark: #3A241E;
        }

        body {
            background: var(--beige);
            font-family: 'Montserrat Alternates', sans-serif;
            color: var(--black);
        }

        h1, h2, h3, h4 {
            font-family: 'Montserrat Alternates', sans-serif;
            color: var(--choco);
            letter-spacing: 0.5px;
        }

        /* NAVBAR */
        .navbar {
            /* background: rgb(#FFFFFF / 35%); */
            backdrop-filter: blur(2px);
        }

        .navbar-brand {
            font-family: 'Montserrat Alternates', sans-serif;
            font-weight: 700;
            font-size: 24px;
            color: var(--choco);
        }

        .nav-link {
            font-weight: 500;
            margin-right: 15px;
            color: var(--choco);
        }

        .nav-link:hover {
            color: var(--choco);
        }

        /* BUTTONS */
        .btn-primary {
            background: var(--choco);
            border: none;
            font-weight: 600;
            border-radius: 16px;
        }

        .btn-primary:hover {
            background: var(--choco-dark);
        }

        .btn-outline-dark {
            border-color: var(--choco);
            color: var(--choco);
        }

        .btn-outline-dark:hover {
            background: var(--choco);
            color: var(--white);
        }

        /* CARDS */
        .card {
            border: none;
            border-radius: 16px;
            background: var(--white);
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        /* FOOTER */
        footer {
            margin-top: 60px;
            padding: 30px 0;
            background: var(--white);
            border-top: 1px solid #e5e5e5;
            text-align: center;
            color: --choco;
            font-size: 14px;
        }
                /* Активные элементы */
        .form-select:focus,
        .form-control:focus {
            border-color: var(--choco);
            box-shadow: 0 0 0 0.2rem rgba(74, 47, 39, 0.25);
        }

        /* Hover карточки */
        .product-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 18px rgba(0,0,0,0.08);
            transition: 0.3s;
        }
        /* Единый стиль кнопок Lume */
        .btn,
        button,
        input[type="submit"],
        input[type="button"] {
            border-radius: 12px !important;
        }
        input,
        select,
        textarea {
            border-radius: 12px !important;
        }
        /* Убираем синий цвет при клике/фокусе у кнопок */
        .btn:focus,
        .btn:active,
        button:focus,
        button:active,
        input[type="submit"]:focus,
        input[type="submit"]:active,
        input[type="button"]:focus,
        input[type="button"]:active {
            background-color: var(--choco-dark) !important;
            border-color: var(--choco-dark) !important;
            box-shadow: 0 0 0 0.2rem rgba(74, 47, 39, 0.35) !important;
        }

        /* Убираем синий outline у ссылок */
        a:focus,
        a:active {
            outline: none !important;
            box-shadow: 0 0 0 0.2rem rgba(74, 47, 39, 0.35) !important;
        }

        /* Убираем синий цвет у input/select при фокусе */
        input:focus,
        select:focus,
        textarea:focus {
            border-color: var(--choco) !important;
            box-shadow: 0 0 0 0.2rem rgba(74, 47, 39, 0.25) !important;
        }

        /* Кнопка поиска — убрать синий при наведении */
        .btn-outline-primary,
        .btn-primary {
            --bs-btn-focus-shadow-rgb: 74, 47, 39;
        }

        .btn-outline-primary:hover {
            background-color: var(--choco) !important;
            border-color: var(--choco) !important;
            color: var(--white) !important;
        }
        .navbar-brand:focus,
        .navbar-brand:active {
            outline: none !important;
            box-shadow: none !important;
        }
/* Фирменные поля */
.auth-input {
    width: 100%;
    padding: 12px 16px;
    border-radius: 12px;
    border: 1px solid #d8d8d8;
    background: var(--white);
    font-size: 15px;
    transition: 0.2s;
}

.auth-input:focus {
    border-color: var(--choco);
    box-shadow: 0 0 0 0.2rem rgba(74, 47, 39, 0.25);
    outline: none;
}

/* Лейблы */
.auth-label {
    font-weight: 600;
    color: var(--choco);
    margin-bottom: 6px;
    display: block;
}

/* Кнопка */
.auth-btn {
    width: 100%;
    background: var(--choco);
    color: var(--white);
    padding: 12px;
    border-radius: 12px;
    border: none;
    font-weight: 600;
    transition: 0.2s;
}

.auth-btn:hover {
    background: var(--choco-dark);
}

/* Контейнер формы */
.auth-box {
    background: var(--white);
    padding: 30px;
    border-radius: 16px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
}

/* Ссылки */
.auth-link {
    color: var(--choco);
    font-weight: 500;
}

.auth-link:hover {
    color: var(--choco-dark);
}

    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand logo" href="/"><img src="/logo.svg" alt="логотип"  height="32"></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="/products">Каталог</a></li>
                <li class="nav-item"><a class="nav-link" href="/favorites">Избранное</a></li>
                <li class="nav-item"><a class="nav-link" href="/cart">Корзина</a></li>

                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Личный кабинет</a>
                    </li>
                @endguest

                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Личный кабинет</a>
                    </li>
                @endauth
            </ul>
        </div>

    <form action="{{ route('products.search') }}" method="GET" class="d-flex" role="search">
    <input
        type="search"
        name="q"
        class="form-control me-2"
        placeholder="Поиск по товарам..."
        value="{{ request('q') }}"
    >
    <button class="btn  btn-primary" type="submit">Найти</button>
</form>
    </div>
</nav>

<div class="container mt-3">
    @yield('content')
</div>

<footer>

    {{-- SUBSCRIBE --}}
    <section class="mt-1 mb-1">

        <div class="d-flex flex-column align-items-center">

            <form class="d-flex justify-content-center mb-3" style="max-width: 1300px;">
             <h3 style="max-width: 400px; margin-right: 20px;">
                Подписка на коллекции
            </h3>   
            <input type="email" 
                       class="form-control me-3"  
                       style="max-width: 200px; border-radius:16px;" 
                       placeholder="Ваш email">

                <button class="btn btn-primary">Подписаться</button>
            </form>

            

        </div>

    </section>

    © 2026 Lume — бренд светильников
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
