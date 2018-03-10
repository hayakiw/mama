@extends('staff.layout.master')

<?php
    $layout = [
        'title' => 'サービス登録',
        // 'description' => '○○のページです。',
        'js' => [],
    ];
?>

@section('content')
<div class="container">
  <div class="page-header">
    <h1>サービス登録</h1>
  </div>

  {!! Form::open( ['route' => 'staff.item.store', 'method' => 'post', 'files' => true, 'class' => 'form-horizontal']) !!}
    @include('staff.item._form', ['item' => $item])
    <div class="form-group">
      <div class="col-md-offset-2 col-md-8">
        <input type="submit" name="submit" value="登録" class="btn btn-success">
      </div>
    </div>
  {!! Form::close() !!}
</div>

@endsection
