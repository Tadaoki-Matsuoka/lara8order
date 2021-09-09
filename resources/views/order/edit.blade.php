@extends('layouts.default')

@section('name', 'Order.edit')

@include('layouts.menu.admin')

@section('content')
<h1 class="page-header">受注編集</h1>
@if(count($errors) > 0)
<ul class="alert alert-danger" role="alert">
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</ul>
@endif
<form action="{{route('admin.order.update', $order->id)}}" method="post">
    @method('PUT')    
    @csrf
    <div class="form-group">
        <label for="name">名前</label>
        <input class="form-control" type="text" name="name" value="{{old('name', $order->name)}}" required>
    </div>
    <div class="form-group">
        <label for="customer_id">顧客</label>
        <select class="form-control" type="text" name="customer_id">
            @foreach($customers as $customer)
            <option value="{{($customer->id)}}"{{$customer->id==old('customer_id',$customer->customer_id)?'selected':''}}>{{($customer->name)}}</option>
            @endforeach
        </select>
    </div>
    <input class="btn btn-primary" type="submit" value="登録"></div>
</form>
@endsection