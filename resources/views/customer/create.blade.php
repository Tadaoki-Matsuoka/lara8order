@extends('layouts.default')

@section('name', 'Customer.create')

@include('layouts.menu.admin')

@section('content')
<h1 class="page-header">顧客登録</h1>
@if(count($errors) > 0)
<ul class="alert alert-danger" role="alert">
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</ul>
@endif
<form action="{{route('admin.customer.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">名前</label>
        <input class="form-control" type="text" name="name" value="{{old('name')}}" required>
    </div>
    <input class="btn btn-primary" type="submit" value="登録"></div>
</form>
@endsection