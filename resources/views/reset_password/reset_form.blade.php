@extends('layout.master')

<?php

    $layout = [
        'left' => false,
        'right' => false,
        'footer' => true,
        'header_buttons' => false,
        'columns' => 1,
        'css' => 'password_reset',
        'title' => 'パスワード再設定',
        'js' => ['password_reset'],
    ];

?>

@section('content')

<h1>パスワード再設定</h1>
<div class="col-md-8">
  <p class="caution">新しいパスワードを入力してください。</p>

  <form method="post" action="{{ route('reset_password.reset') }}" class="form-horizontal">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <input type="hidden" name="token" value="{{ request()->token }}">

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
      <label for="password" class="control-label col-md-4"><span>必須</span>新しいパスワード</label>
      <div class="col-md-8">
        <input type="password" name="password" id="password" value="{{ old('password') }}" class="form-control" placeholder="半角英数字6～20文字で入力">
        @if ($errors->has('password'))
        <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
        @endif
      </div>
    </div>

    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
      <label for="password_confirmation" class="control-label col-md-4"><span>必須</span>新しいパスワード（確認用）</label>
      <div class="col-md-8">
        <input type="password" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control" placeholder="半角英数字6～20文字で入力">
        @if ($errors->has('password_confirmation'))
        <span class="help-block"><strong>{{ $errors->first('password_confirmation') }}</strong></span>
        @endif
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-offset-4 col-md-8">
        <button type="submit" class="btn btn-default">変更する</button>
      </div>
    </div>
  </form>
</div>

@endsection
