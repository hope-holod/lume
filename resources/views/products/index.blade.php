@extends('layout')

@section('content')

<section class="mt-4 mb-5" style="max-width: 1200px; margin: 0 auto;">

    <h2 class="mb-4">Каталог</h2>

    {{-- Фильтры --}}
    <form method="GET" class="d-flex gap-2 align-items-center mb-4 flex-wrap">

        {{-- Категории --}}
        <select name="category" class="form-select me-3" style="max-width: 200px; border-radius: 12px;">
            <option value="">Все категории</option>
            <option value="pendant">Подвесные</option>
            <option value="table">Настольные</option>
            <option value="wall">Настенные</option>
        </select>

        {{-- Дополнительный фильтр: стиль --}}
        <select name="style" class="form-select me-3" style="max-width: 200px; border-radius: 12px;">
            <option value="">Все стили</option>
            <option value="modern">Современный</option>
            <option value="minimal">Минимализм</option>
            <option value="loft">Лофт</option>
        </select>

        {{-- Сортировка --}}
        <select name="sort" class="form-select me-3" style="max-width: 200px; border-radius: 12px;">
            <option value="">Сортировка</option>
            <option value="name_asc">Название: A → Я</option>
            <option value="name_desc">Название: Я → A</option>
            <option value="price_asc">Цена: ↑</option>
            <option value="price_desc">Цена: ↓</option>
        </select>

        <button class="btn btn-primary">Применить</button>
    </form>

    {{-- Сетка товаров --}}
    <div class="row g-4">

        @foreach($products as $product)
        <div class="col-md-4">

            {{-- ВЕСЬ БЛОК КАРТОЧКИ — КЛИКАБЕЛЬНЫЙ --}}
            <!-- <a href="{{ $product->id ? route('products.show', $product->id) : '#' }}" style="text-decoration: none; color: inherit;"> -->
<a href="{{ route('products.show', $product->product_id) }}" style="text-decoration: none; color: inherit;">

                <div class="card product-card p-0" 
                     style="overflow: hidden; border-radius: 20px;">

                    <img src="{{ asset($product->images->first()->image) }}"
                        class="product-imagew-100"
                         style="height: 320px; object-fit: cover;">

                    <div class="p-4">
                        <h4 style="font-family: 'Montserrat Alternates'; font-size: 20px;">
                            {{ $product->name }}
                        </h4>

                        <p style="color: var(--choco); font-weight: 600; font-size: 18px;">
                            {{ $product->price }} BYN
                        </p>
                    </div>

                </div>

            </a>
        </div>
        @endforeach

    </div>

</section>

@endsection
