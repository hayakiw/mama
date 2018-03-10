@extends('layout.master')

<?php

    $layout = [
        'title' => $item->title . "|サービス詳細",
        'description' => $item->title . 'のサービス詳細ページです。',
    ];

?>

@section('content')

<div class="container">

<div class="panel panel-default" style="margin-top:30px;">
  <div class="panel-heading">{{ $item->title }}</div>
  <div class="panel-body">

価格:{{ $item->price }}<br>
最大利用時間:{{ $item->max_hours }}<br>
地域:{{ $item->staff->prefecture }}({{ $item->staff->area }})<br>
説明:<br>
{{ $item->description}}
  </div>
</div>


@if (!Auth::guard('web')->check())
<br>
<a href="{{ route('auth.signin') }}" class="exhibit">ログイン</a>または
<a href="{{ route('user.create') }}" class="exhibit">新規登録</a>

@else
{{ Form::model($item, ['route' => ['item.pay', '?' . http_build_query($_GET)] , 'method' => 'post']) }}
@include('item._form', ['item' => $item])

<div class="margin:20px 0;">
  <button type="submit" class="btn btn-primary"><span>依頼する</span></button>
</div>
{!! Form::close() !!}
@endif

</div>
@endsection
