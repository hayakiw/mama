@extends('layout.master')

<?php

    $layout = [
        'left' => false,
        'right' => false,
        'footer' => true,
        'header_buttons' => false,
        'columns' => 1,
        'css' => 'password_remind',
        'title' => 'パスワード再設定',
        'js' => [],
    ];

?>

@section('content')

<h1>パスワード再設定</h1>
<div class="col-md-8">
  <p class="caution">セキュリティ上の観点から、「パスワード」はお問い合わせをいただいてもお答えできません。<br />
    パスワードをお忘れの場合は、パスワードの再設定をお願いいたします。</p>
  <p class="caution">ご登録のメールアドレスを入力して「送信する」を押してください。<br />
    パスワード再設定手順の案内メールをお送りしますので、メールの指示に従ってパスワードを再設定してください。<br />
  </p>

  <form method="post" action="{{ route('reset_password.request') }}" class="form-horizontal">
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
      <label for="email" class="control-label col-md-4">メールアドレス</label>
      <div class="col-md-8">
        <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="user@example.com">
        @if ($errors->has('email'))
        <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
        @endif
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-offset-4 col-md-8">
        <button type="submit" class="btn btn-default">送信する</button>
      </div>
    </div>
  </form>
</div>

@endsection
