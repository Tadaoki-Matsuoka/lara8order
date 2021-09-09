@extends('layouts.default')

@section('name', 'OrderDetail.create')

@include('layouts.menu.admin')

@section('content')
<h1 class="page-header">受注詳細新規追加</h1>
@if(count($errors) > 0)
<ul class="alert alert-danger" role="alert">
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</ul>
@endif
<form action="{{route('admin.detail.store', $order->id)}}" method="post">
    @csrf
    <div class="form-group">
        <label for="product_id">商品</label>
        <select class="form-control" type="text" name="product_id">
            @foreach($products as $product)
            <option value="{{($product->id)}}"{{$product->id==old('product_id',$product->product_id)?'selected':''}}>{{($product->name)}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="name">個数</label>
        <input class="form-control" type="text" name="unit" value="{{old('unit')}}" required>
    </div>
    <input class="btn btn-primary" type="submit" value="登録">
</form>
@endsection