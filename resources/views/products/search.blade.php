@extends('layout')

@section('content')
<div class="container py-4">
    <h1 class="mb-3">
        Результаты поиска
        @if($q)
            по запросу: «{{ $q }}»
        @endif
    </h1>

    @if($products->isEmpty())
        <p>Ничего не найдено. Попробуйте изменить запрос.</p>
    @else
        <div class="row g-4">
            @foreach($products as $product)
                <div class="col-md-3">
                    <div class="card p-3 h-100">
                        @if($product->images->first())
                            <img src="{{ asset($product->images->first()->image) }}"
                                 class="card-img-top"
                                 style="width: 100%; height: 220px; object-fit: cover; border-radius: 12px;">
                        @endif

                        <h5 class="mt-3" style="font-family: 'Montserrat Alternates';">
                            {{ $product->name }}
                        </h5>

                        <p style="color: #4A2F27; font-weight: 600;">
                            {{ $product->price }} BYN
                        </p>

                        <a href="{{ route('products.show', $product->product_id) }}" class="btn btn-primary w-100">
                            Подробнее
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
