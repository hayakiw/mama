@extends('layout.master')

<?php

    $layout = [
        'title' => 'お問い合わせ'
    ];

?>

@section('content')
<div class="container">
  <div class="page-header">
    <h1>お問い合わせ</h1>
    <p class="lead">下記の項目を入力して「登録する」を押してください。</p>
  </div>

  {!! Form::open( ['route' => 'contact.store', 'method' => 'post', 'files' => true, 'class' => 'form-horizontal']) !!}

    <div class="form-group">
      <label for="inputName" class="control-label col-md-2">お名前</label>
      <div class="col-md-4">
        <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' err' : '' }}" value="{{ old('name') }}" placeholder="お名前">
        @if ($errors->has('name'))
           <span class="err_message"><strong>{{ $errors->first('name') }}</strong></span>
        @endif
      </div>
    </div>

    <div class="form-group">
      <label for="inputEmail" class="control-label col-md-2">メールアドレス</label>
      <div class="col-md-4">
        <input type="text" name="email" class="form-control{{ $errors->has('email') ? ' err' : '' }}" value="{{ old('email') }}" placeholder="メールアドレス">
        @if ($errors->has('email'))
           <span class="err_message"><strong>{{ $errors->first('email') }}</strong></span>
        @endif
      </div>
    </div>

    <div class="form-group">
      <label for="inputBody" class="control-label col-md-2">お問い合わせ内容</label>
      <div class="col-md-4">
        <textarea name="body" rows="6" class="form-control{{ $errors->has('body') ? ' err' : '' }}">{{ old('body') }}</textarea>
        @if ($errors->has('body'))
           <span class="err_message"><strong>{{ $errors->first('body') }}</strong></span>
        @endif
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-offset-2 col-md-4">
        <button type="submit" name="submit" id="btn_regist" class="btn btn-success btn-block"><span>送信する</span></button>
      </div>
    </div>
  {!! Form::close() !!}
</div>

@endsection
