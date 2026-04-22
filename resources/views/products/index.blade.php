@extends('layout')

@section('content')

<section class="mt-4 mb-5" style="max-width: 1200px; margin: 0 auto;">

    <h2 class="mb-4">Каталог</h2>

<form method="GET" class="d-flex gap-2 align-items-center mb-4 flex-wrap">

    {{-- Категория --}}
        <select name="category_id" class="form-select" style="max-width: 200px;">
            <option value="">Все категории</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->category_id }}"
                    {{ (string)request('category_id') === (string)$cat->category_id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>

    {{-- Стиль --}}
    <select name="style" class="form-select" style="max-width: 200px;">
        <option value="">Все стили</option>
        <option value="Современный" {{ request('style')=='Современный' ? 'selected' : '' }}>Современный</option>
        <option value="Минимализм" {{ request('style')=='Минимализм' ? 'selected' : '' }}>Минимализм</option>
        <option value="Лофт" {{ request('style')=='Лофт' ? 'selected' : '' }}>Лофт</option>
        <option value="Классический" {{ request('style')=='Классический' ? 'selected' : '' }}>Классический</option>
    </select>

    {{-- Материал --}}
    <select name="material" class="form-select" style="max-width: 200px;">
        <option value="">Материал</option>
        <option value="Металл" {{ request('material')=='Металл' ? 'selected' : '' }}>Металл</option>
        <option value="Стекло" {{ request('material')=='Стекло' ? 'selected' : '' }}>Стекло</option>
        <option value="Дерево" {{ request('material')=='Дерево' ? 'selected' : '' }}>Дерево</option>
        <option value="Пластик" {{ request('material')=='Пластик' ? 'selected' : '' }}>Пластик</option>
    </select>

    {{-- Цвет --}}
    <select name="color" class="form-select" style="max-width: 200px;">
        <option value="">Цвет</option>
        <option value="Черный" {{ request('color')=='Черный' ? 'selected' : '' }}>Черный</option>
        <option value="Белый" {{ request('color')=='Белый' ? 'selected' : '' }}>Белый</option>
        <option value="Золотой" {{ request('color')=='Золотой' ? 'selected' : '' }}>Золотой</option>
        <option value="Серебристый" {{ request('color')=='Серебристый' ? 'selected' : '' }}>Серебристый</option>
    </select>


    {{-- Мощность --}}
    <select name="power" class="form-select" style="max-width: 200px;">
        <option value="">Мощность</option>
        <option value="6W" {{ request('power')=='6W' ? 'selected' : '' }}>6W</option>
        <option value="8W" {{ request('power')=='8W' ? 'selected' : '' }}>8W</option>
        <option value="10W" {{ request('power')=='10W' ? 'selected' : '' }}>10W</option>
        <option value="12W" {{ request('power')=='12W' ? 'selected' : '' }}>12W</option>
    </select>

    {{-- Сортировка --}}
    <select name="sort" class="form-select" style="max-width: 200px;">
        <option value="">Сортировка</option>
        <option value="name_asc" {{ request('sort')=='name_asc' ? 'selected' : '' }}>Название: A → Я</option>
        <option value="name_desc" {{ request('sort')=='name_desc' ? 'selected' : '' }}>Название: Я → A</option>
        <option value="price_asc" {{ request('sort')=='price_asc' ? 'selected' : '' }}>Цена: ↑</option>
        <option value="price_desc" {{ request('sort')=='price_desc' ? 'selected' : '' }}>Цена: ↓</option>
    </select>

    <button class="btn btn-primary">Применить</button>
</form>


    {{-- Сетка товаров --}}
    <div class="row g-4">
@if(isset($q) && $products->isEmpty())
    <div class="alert alert-warning mt-4">
        По вашему запросу ничего не найдено.
    </div>
@endif

        @foreach($products as $product)
        <div class="col-md-4">

            {{-- ВЕСЬ БЛОК КАРТОЧКИ — КЛИКАБЕЛЬНЫЙ--}}
           
                <a href="{{ route('products.show', $product->product_id) }}" style="text-decoration: none; color: inherit;">

                <div class="card product-card p-0" 
                     style="overflow: hidden; border-radius: 20px;">


                         <img src="{{ asset(optional($product->images->first())->image ?? 'no-image.png') }}"
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
