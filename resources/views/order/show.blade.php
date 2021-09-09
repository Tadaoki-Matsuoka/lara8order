@extends('layouts.default')

@section('title', 'Order.show')

@include('layouts.menu.admin')

@section('content')
<h1 class="page-header">受注表示</h1>
<table class="table" cellpadding="0" cellspacing="0">
    <tr>
        <th scope="col">{{__('id')}}</th>
        <th scope="col">{{__('name')}}</th>
        <th scope="col">顧客名</th>
        <th scope="col">{{__('created_at')}}</th>
        <th scope="col">{{__('updated_at')}}</th>
    </tr>
  <tr>
      <td>{{$order->id}}</td>
      <td>{{$order->name}}</td>
      <td>{{$order->Customer->name}}</td>
      <td>{{$order->Customer->created_at->format('Y年m月d日H時i分')}}</td>
      <td>{{$order->Customer->updated_at->format('Y年m月d日H時i分')}}</td>
  </tr>
</table>
<div class="actions text-nowrap" style="text-align: center;">
    <a class="btn btn-primary" href="{{route('admin.order.edit', $order->id)}}" >受注編集</a>
</div>
<br />
<h1>受注詳細表示</h1>
@if(session('success'))
<div class="alert alert-success" role="alert">{{session('success')}}</div>
@endif
@if(session('error'))
<div class="alert alert-error" role="alert">{{session('error')}}</div>
@endif
<table class="table table-striped" cellpadding="0" cellspacing="0">
    <tr>
        <th scope="col">id</th>
        <th scope="col">商品名</th>
        <th scope="col">金額</th>
        <th scope="col">個数</th>
        <th scope="col">小計</th>
        <th scope="col">アクション</th>
    </tr>
    @foreach($order->order_details as $detail)
    <tr>
        <td>{{$detail->id}}</td>
        <td>{{$detail->Product->name}}</td>
        <td>{{$detail->Product->price}}</td>
        <td>{{$detail->unit}}</td>
        <td>{{$detail->Product->price*$detail->unit}}</td>
        <td class="actions text-nowrap">
            <a class="btn btn-primary" href="{{route('admin.detail.edit', $detail->id)}}">編集</a>
        </td>
    </tr>
    @endforeach
</table>
<div class="actions text-nowrap" style="text-align: center;">
    <a href="{{route('admin.detail.create', $order->id)}}" class="btn btn-primary">受注詳細新規追加</a>
</div>
@endsection