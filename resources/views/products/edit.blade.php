@extends('layouts.shop')
@section('title', 'Edit Produk')
@section('content')
<div class="card"><h1>Edit Produk</h1>
<form method="POST" action="{{ route('products.update', $product) }}">@csrf @method('PUT') @include('products._form')</form>
</div>
@endsection
