@extends('layout.master')

<?php
    $layout = [
        'title' => '依頼状況',
        // 'description' => '○○のページです。',
        'js' => [],
    ];
?>

@section('content')

<div class="container">
  <div class="page-header">
    <h1>依頼状況</h1>
  </div>

<table class="table">
  <thead>
    <tr>
      <th>申込日時名</th>
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
      <td>{{ $order->created_at }}</td>
      <td>{{ $order->title }}</td>
      <td>{{ $order->hours }}</td>
      <td>{{ $order->price }}</td>
      <td>{{ $order->prefer_at }}</td>
      <td>{{ $order->prefer_at2 }}</td>
      <td>{{ $order->prefer_at3 }}</td>
      <td>{{ $order->getStatus() }}</td>
      <td>
        <a href="{{ route('orders.show', $order) }}" class="btn btn-xs btn-warning">詳細</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection
