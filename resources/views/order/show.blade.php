@extends('layout.master')

<?php

    $layout = [
        'title' => $order->title . "|依頼詳細",
        'description' => $order->title . 'の依頼詳細ページです。',
    ];

?>

@section('content')

<div class="container">

<div class="panel panel-default" style="margin-top:30px;">
  <div class="panel-heading">{{ $order->title }}</div>
  <div class="panel-body">

価格:{{ $order->price * $order->hours }}<br>
利用時間:{{ $order->hours }}<br>
コメント:<br>
{!! nl2br(e($order->comment)) !!}<br>

状態：{{ $order->getStatus() }}

  </div>
</div>

<br><br><br>
依頼日時：{{ $order->work_at }}<br>
返信内容：<br>
{!! nl2br(e($order->staff_comment)) !!}<br>

</div>
@endsection
