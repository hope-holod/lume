
<style>
.account-wrapper {
    max-width: 1000px;
    margin: 40px auto;
    padding: 20px;
    min-height: 400px;
}
.account-div {
    display: flex;
}
.account-card {
    background: var(--beige);
    padding: 30px;
    border-radius: 16px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.08);
    max-width:400px;
    margin-right:60px;  
    margin-bottom:40px;  
}

.account-actions {
    margin-top: 20px;
    display: flex;
    gap: 12px;
    max-height:40px;
}
.account-history{
display: flex;
    flex-direction: column;
}

.btn-primary {
    background: var(--choco);
    color: #fff;
    padding: 10px 18px;
    border-radius: 8px;
}

.btn-secondary {
    background: var(--choco-dark);
    color: #fff;
    padding: 10px 18px;
    border-radius: 8px;
}

.btn-danger {
    background: #812536ff;
    color: #fff;
    padding: 10px 18px;
    border-radius: 8px;
}
.account-title{
    margin-bottom:15px;
}
</style>

@extends('layout')

@section('title', 'Личный кабинет')

@section('content')
<div class="account-wrapper">

    <h1 class="account-title">Личный кабинет</h1>

    <div class="account-div">
        <div class="account-card">
            <div class="account-info">
                <p><span>Имя:</span> {{ $user->name }}</p>
                <p><span>Email:</span> {{ $user->email }}</p>
            </div>

            <div class="account-actions">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-primary">Выйти</button>
                </form>

                <form method="POST" action="{{ route('account.delete') }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Удалить аккаунт</button>
                </form>
            </div>

        </div>
    </div>
@if(auth()->check() && auth()->user()->role_id == 2)

<h2 style="margin-top:40px;">Админ‑панель — Товары</h2>

<!-- Кнопка добавить -->
<button onclick="document.getElementById('addModal').style.display='block'"
        style="padding:10px 20px; background:var(--choco); color:#fff; border:none; border-radius:8px; margin-bottom:20px;">
    Добавить товар
</button>

<table style="width:100%; border-collapse:collapse;">
    <tr style="background:#f0eae4;">
        <th style="padding:8px; border:1px solid #ddd;">ID</th>
        <th style="padding:8px; border:1px solid #ddd;">Название</th>
        <th style="padding:8px; border:1px solid #ddd;">Цена</th>
        <th style="padding:8px; border:1px solid #ddd;">Категория</th>
        <th style="padding:8px; border:1px solid #ddd;">Коллекция</th>
        <th style="padding:8px; border:1px solid #ddd;">Действия</th>
    </tr>

    @foreach(\App\Models\Product::all() as $product)
        <tr>
            <td style="padding:8px; border:1px solid #ddd;">{{ $product->product_id }}</td>
            <td style="padding:8px; border:1px solid #ddd;">{{ $product->name }}</td>
            <td style="padding:8px; border:1px solid #ddd;">{{ $product->price }} BYN</td>
            <td style="padding:8px; border:1px solid #ddd;">{{ $product->category->name ?? '—' }}</td>
            <td style="padding:8px; border:1px solid #ddd;">{{ $product->collection->name ?? '—' }}</td>

            <td style="padding:8px; border:1px solid #ddd;">
                <button onclick="document.getElementById('edit-{{ $product->product_id }}').style.display='block'"
                        style="padding:6px 12px; background:var(--choco); color:#fff; border:none; border-radius:6px;">
                    Редактировать
                </button>

                <form action="{{ route('admin.product.delete', $product->product_id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    <button type="submit"
                            style="padding:6px 12px; background:#b30000; color:#fff; border:none; border-radius:6px;">
                        Удалить
                    </button>
                </form>
            </td>
        </tr>

        <!-- Модальное окно редактирования -->
        <div id="edit-{{ $product->product_id }}" class="modal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5);">
            <div style="background:white; padding:20px; width:400px; margin:100px auto; border-radius:10px;">
                <h3>Редактировать товар</h3>

                <form action="{{ route('admin.product.update', $product->product_id) }}" method="POST">
                    @csrf

                    <label>Название:</label>
                    <input type="text" name="name" value="{{ $product->name }}" style="width:100%; padding:8px; margin-bottom:10px;">

                    <label>Цена:</label>
                    <input type="number" name="price" value="{{ $product->price }}" style="width:100%; padding:8px; margin-bottom:10px;">

                    <label>Категория:</label>
                    <select name="category_id" style="width:100%; padding:8px; margin-bottom:10px;">
                        @foreach(\App\Models\Category::all() as $cat)
                            <option value="{{ $cat->category_id }}" 
                                @if($cat->category_id == $product->category_id) selected @endif>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>

                    <label>Коллекция:</label>
                    <select name="collection_id" style="width:100%; padding:8px; margin-bottom:10px;">
                        @foreach(\App\Models\Collection::all() as $col)
                            <option value="{{ $col->collection_id }}"
                                @if($col->collection_id == $product->collection_id) selected @endif>
                                {{ $col->name }}
                            </option>
                        @endforeach
                    </select>

                    <button type="submit" style="padding:10px 20px; background:var(--choco); color:#fff; border:none; border-radius:8px;">
                        Сохранить
                    </button>

                    <button type="button" onclick="document.getElementById('edit-{{ $product->product_id }}').style.display='none'"
                            style="padding:10px 20px; background:#777; color:#fff; border:none; border-radius:8px;">
                        Закрыть
                    </button>
                </form>
            </div>
        </div>

    @endforeach
</table>


<!-- Модальное окно добавления -->
<div id="addModal" class="modal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5);">
    <div style="background:white; padding:20px; width:400px; margin:100px auto; border-radius:10px;">
        <h3>Добавить товар</h3>

        <form action="{{ route('admin.product.create') }}" method="POST">
            @csrf

            <label>Название:</label>
            <input type="text" name="name" style="width:100%; padding:8px; margin-bottom:10px;">

            <label>Цена:</label>
            <input type="number" name="price" style="width:100%; padding:8px; margin-bottom:10px;">

            <label>Категория:</label>
            <select name="category_id" style="width:100%; padding:8px; margin-bottom:10px;">
                @foreach(\App\Models\Category::all() as $cat)
                    <option value="{{ $cat->category_id }}">{{ $cat->name }}</option>
                @endforeach
            </select>

            <label>Коллекция:</label>
            <select name="collection_id" style="width:100%; padding:8px; margin-bottom:10px;">
                @foreach(\App\Models\Collection::all() as $col)
                    <option value="{{ $col->collection_id }}">{{ $col->name }}</option>
                @endforeach
            </select>


            <button type="submit" style="padding:10px 20px; background:var(--choco); color:#fff; border:none; border-radius:8px;">
                Добавить
            </button>

            <button type="button" onclick="document.getElementById('addModal').style.display='none'"
                    style="padding:10px 20px; background:#777; color:#fff; border:none; border-radius:8px;">
                Закрыть
            </button>
        </form>
    </div>
</div>


@endif



<div class="account-history">
    <h2 class="account-subtitle" style="padding-top:35px;">История заказов</h2>

    @if($orders->isEmpty())
        <p class="empty-text">У вас пока нет заказов.</p>
    @else
        @foreach($orders as $order)
            <div class="order-card" style="
                background: var(--beige);
                padding: 20px;
                border-radius: 12px;
                margin-bottom: 20px;
                box-shadow: 0 4px 16px rgba(0,0,0,0.06);
            ">
                <p style="font-size:18px; font-weight:600; margin:0 0 8px;">
                Заказ    
                <!-- Заказ №{{ $order->order_id }} -->
                </p>

                <p style="margin:0 0 6px;">
                    Сумма: <strong>{{ $order->total_price }} ₽</strong>
                </p>

                <p style="margin:0 0 12px; color:#7a6a5a;">
                    Дата: {{ $order->order_date }}
                </p>

                {{-- Товары в заказе --}}
                <div style="margin-top:10px;">
                    @foreach($order->items as $item)
                        <div style="
                            display:flex;
                            align-items:center;
                            justify-content:space-between;
                            padding:8px 0;
                            border-bottom:1px solid #e5e5e5;
                        ">
                            <div style="display:flex; align-items:center; gap:12px;">
                                <img src="{{ asset($item->product->images->first()->image ?? 'placeholder.jpg') }}"
                                     style="width:50px; height:50px; object-fit:cover; border-radius:8px;">

                                <div>
                                    <p style="margin:0; font-weight:500;">
                                        {{ $item->product->name }}
                                    </p>
                                    <p style="margin:2px 0 0; color:#7a6a5a;">
                                        {{ $item->quantity }} × {{ $item->price }} ₽
                                    </p>
                                </div>
                            </div>

                            <p style="margin:0; font-weight:600;">
                                {{ $item->quantity * $item->price }} ₽
                            </p>
                        </div>
                    @endforeach
                </div>

            </div>
        @endforeach
    @endif
</div>
</div>
</div>
@endsection
