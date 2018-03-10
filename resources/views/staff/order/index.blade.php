@extends('staff.layout.master')

<?php
    $layout = [
        'title' => '依頼管理',
        // 'description' => '○○のページです。',
        'js' => [],
    ];
?>

@section('content')
<div class="container">
  <div class="page-header">
    <h1>依頼管理</h1>
  </div>

<table class="table">
  <thead>
    <tr>
      <th>サービス名</th>
      <th>時間</th>
      <th>金額</th>
      <th>希望日時</th>
      <th></th>
      <th></th>
      <th>状態</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($orders as $order)
    <tr>
      <td>{{ $order->title }}</td>
      <td>{{ $order->hours }}</td>
      <td>{{ $order->price }}</td>
      <td>{{ $order->use_at }}</td>
      <td>{{ $order->use_at2 }}</td>
      <td>{{ $order->use_at3 }}</td>
      <td>{{ $order->getStatus() }}</td>
      <td>
        <a href="{{ route('staff.orders.show', $order) }}" class="btn btn-xs btn-warning">依頼確認</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection
