@extends('layout.master')

<?php

    $layout = [
        'title' => '決済',
        'description' => '○○のページです。',
    ];

?>

@section('content')
<div class="container">
  <div class="page-header">
    <h1>決済</h1>
  </div>

<div class="panel panel-default" style="margin-top:30px;">
  <div class="panel-heading">{{ $order->title }}</div>
  <div class="panel-body">

価格:{{ number_format($order->price * $order->hours) }}円<br>
利用時間:{{ $order->hours }}<br>
コメント:<br>
{!! nl2br(e($order->comment)) !!}
  </div>
</div>

<div>請求金額合計：<strong>{{ number_format($order->item->price * $order->hours) }}円</strong></div>
<br>
{{ Form::model($order, ['route' => ['item.order', '?' . http_build_query($_GET)] , 'method' => 'post']) }}
  <input type="hidden" name="ordered_token" value="{{ $order->ordered_token }}">
  <script src="{{ config('my.pay.checkout_url') }}" class="payjp-button" data-key="{{ config('my.pay.public_key') }}"></script>
{!! Form::close() !!}

<p class="help-block">※まだ申し込みは完了していません。上記より支払いを済ませてください。<br>
なお、取引が不成立の場合は引き落としされることはありません。
</p>

</div>
@endsection
