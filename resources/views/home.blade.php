@extends('layout')

@section('content')

{{-- HERO SECTION --}}
<section class="hero d-flex align-items-center" style="
    background: url('/hero.jpg') center/cover no-repeat;
    height: 70vh;
    border-radius: 20px;
    position: relative;
">
    <div style="
        background: rgb(222 218 218 / 35%);
        backdrop-filter: blur(2px);
        padding: 40px;
        border-radius: 20px;
        max-width: 800px;
        margin-left: 40px;
    ">
        <h1 style="color: #3A241E; font-size: 48px; font-family: 'Montserrat Alternates';">
            Современное освещение<br>для вашего пространства
        </h1>
        <a href="/products" class="btn btn-primary mt-4" style="padding: 12px 28px; font-size: 18px;">
            Перейти в каталог
        </a>
    </div>
</section>


{{-- NEW PRODUCTS --}}
<section class="mt-5">
    <h2 class="mb-4">Новинки</h2>

    <div class="row g-4">
        @foreach($products as $product)
            <div class="col-md-3">
                <div class="card p-3">
                    <img src="{{ asset($product->images->first()->image) }}"
                        class="card-img-top"
                        style="width: 100%; height: 280px; object-fit: cover; border-radius: 12px;">


                    <h5 class="mt-3" style="font-family: 'Montserrat Alternates';">
                        {{ $product->name }}
                    </h5>

                    <p style="color: #4A2F27; font-weight: 600;">
                        {{ $product->price }} BYN
                    </p>

                    <a href="/products/{{ $product->id }}" class="btn btn-primary w-100">
                        Подробнее
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</section>
{{-- PROJECTS --}}
<section class="mt-5">
    <h2 class="mb-4">Проекты</h2>

    <div class="row g-4">

        <div class="col-md-4">
            <div class="card p-0" style="overflow: hidden; height: 550px;">
                <img src="/project1.png" class="w-100" style="height: 380px; object-fit: cover;">
                <div class="p-4">
                    <h4>Проект “Коттедж в сосновом бору”</h4>
                    <a href="#" class="btn btn-outline-dark mt-2">Подробнее</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-0" style="overflow: hidden; height: 550px;">
                <img src="/project2.png" class="w-100" style="height: 380px; object-fit: cover;">
                <div class="p-4">
                    <h4>Проект “Итальянский ресторан”</h4>
                    <a href="#" class="btn btn-outline-dark mt-2">Подробнее</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-0" style="overflow: hidden; height: 550px;">
                <img src="/project3.png" class="w-100" style="height: 380px; object-fit: cover;">
                <div class="p-4">
                    <h4>Проект “Сканди квартира”</h4>
                    <a href="#" class="btn btn-outline-dark mt-2">Подробнее</a>
                </div>
            </div>
        </div>

    </div>
</section>



{{-- TEAM --}}
<section class="mt-5">
    <h2 class="mb-4">Наша команда</h2>

    <div class="card p-4" style="background: white; border-radius: 20px;">
        <div class="row align-items-center">

            <div class="col-md-6">
                <p style="font-size: 18px;">
                    Команда LUMÉ — это союз дизайнеров, архитекторов, инженеров и творческих специалистов,
                    объединённых страстью к созданию эстетичных и функциональных объектов.
                </p>
                <a href="#" class="btn btn-primary mt-3">Стать партнёром</a>
            </div>

            <div class="col-md-6 d-flex justify-content-center">
                <img src="/team.png" 
                     style="max-width: 500px; height: auto; border-radius: 20px;">
            </div>

        </div>
    </div>
</section>





@endsection
