@extends('layout')

@section('content')

<div class="container py-5" style="max-width: 1200px;">

    {{-- Название --}}
    <h2 class="mb-4" style="font-family: 'Montserrat Alternates';">
        {{ $product->name }}
    </h2>

    <div class="row g-5">

        {{-- Фото товара + мини-галерея --}}
        <div class="col-md-4">

            {{-- Главное изображение --}}
            <img src="{{ asset($product->images->first()->image ?? 'placeholder.jpg') }}"
                 class="main-image"
                 style="max-width: 380px; max-height: 480px; border-radius: 20px; object-fit: cover;">

            {{-- Миниатюры --}}
            @if($product->images->count() > 1)
                <div class="d-flex gap-3 mt-3 flex-wrap">
                    @foreach($product->images as $image)
                        <img src="{{ asset($image->image) }}"
                             class="thumb"
                             style="width: 90px; height: 90px; object-fit: cover; border-radius: 10px; cursor: pointer;">
                    @endforeach
                </div>
            @endif

        </div>

        {{-- Информация --}}
        <div class="col-md-6">

            {{-- Цена --}}
            <p style="font-size: 26px; font-weight: 600; color: var(--choco);">
                {{ $product->price }} BYN
            </p>

            {{-- Краткое описание --}}
            <p style="font-size: 16px; line-height: 1.6;">
                {{ $product->short_description ?: 'Описание товара скоро появится.' }}
            </p>

            {{-- Кнопки --}}
            <div class="d-flex gap-3 mt-4">

            {{-- В корзину --}}
                <form action="#" method="POST">
                    @csrf
                    <button class="btn btn-primary px-4">
                        В корзину
                    </button>
                </form>

                {{-- В избранное --}}
                <form action="#" method="POST">
                    @csrf
                    <button class="btn btn-outline-dark px-4">
                        В избранное
                    </button>
                </form>

            </div>

            {{-- Характеристики --}}
            <div class="mt-5">
                <h4 style="font-family: 'Montserrat Alternates';">Характеристики</h4>

                <ul style="list-style: none; padding-left: 0; margin-top: 15px;">
                    <p><strong>Категория:</strong> {{ $product->category->name ?? '—' }}</p>
                    <li><strong>Материал:</strong> {{ $product->material ?: '—' }}</li>
                    <li><strong>Цвет:</strong> {{ $product->color ?: '—' }}</li>
                    <li><strong>Стиль:</strong> {{ $product->style ?: '—' }}</li>
                    <li><strong>Размер:</strong> {{ $product->size ?: '—' }}</li>
                    <li><strong>Мощность:</strong> {{ $product->power ?: '—' }}</li>
                </ul>
            </div>

        </div>
    </div>

    {{-- Полное описание --}}
    <div class="mt-5 card p-4" style="border-radius: 20px;">
        <h4 style="font-family: 'Montserrat Alternates';">Описание</h4>
        <p style="font-size: 16px; line-height: 1.6;">
            {{ $product->description ?: 'Подробное описание появится позже.' }}
        </p>
    </div>

</div>

{{-- JS для переключения изображений --}}
<script>
    document.querySelectorAll('.thumb').forEach(img => {
        img.addEventListener('click', () => {
            document.querySelector('.main-image').src = img.src;
        });
    });
</script>

@endsection
