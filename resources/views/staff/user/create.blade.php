@extends('staff.layout.master')

<?php

    $layout = [
        'title' => '新規会員登録',
    ];

?>

@section('content')
@if ($errors->count())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif


<div class="container">
  <div class="page-header">
    <h1>新規会員登録</h1>
    <p class="lead">下記の項目を入力して「登録する」を押してください。</p>
  </div>

  {!! Form::open(['route' => 'staff.user.store', 'method' => 'post', 'files' => true, 'class' => 'form-horizontal']) !!}
    <div class="form-group">
      <label for="email" class="control-label col-md-2">メールアドレス<span class="text-danger">※</span></label>
      <div class="col-md-4">
        <input type="mail" name="email" placeholder="半角英数字で入力" value="{{ Request::old('email') }}" class="form-control{{ ($errors->has('email')) ? ' err' : '' }}"  />
        @if ($errors->has('email'))
        <p class="err_message"><span>{{ $errors->first('email') }}</span></p>
        @endif
        <p>※非公開</p>
      </div>

      <label for="password" class="control-label col-md-2">パスワード <span class="text-danger">※</span></label>
      <div class="col-md-4">
        <input type="password" name="password" placeholder="半角英数字6～20文字で入力" class="form-control{{ ($errors->has('password')) ? ' err' : '' }}"  />
        @if ($errors->has('password'))
        <p class="err_message"><span>{{ $errors->first('password') }}</span></p>
        @endif
      </div>
    </div>

    <div class="form-group">
      <label for="" class="control-label col-md-2">姓 <span class="text-danger">※</span></label>
      <div class="col-md-4">
        <input type="text" name="last_name" placeholder="姓" value="{{ Request::old('last_name') }}" class="form-control{{ $errors->has('last_name') ? ' err' : '' }}" />
        @if ($errors->has('last_name'))
        <p class="err_message"><span>{{ $errors->first('last_name') }}</span></p>
        @endif
      </div>

      <label for="" class="control-label col-md-2">名 <span class="text-danger">※</span></label>
      <div class="col-md-4">
        <input type="text" name="first_name" placeholder="名" value="{{ Request::old('first_name') }}" class="form-control{{ $errors->has('first_name') ? ' err' : '' }}" />
        @if ($errors->has('first_name'))
        <p class="err_message"><span>{{ $errors->first('first_name') }}</span></p>
        @endif
      </div>
    </div>

    <div class="form-group">
      <label for="" class="control-label col-md-2">生年月日 <span class="text-danger">※</span></label>
      <div class="col-md-4">
        <input type="date" name="birth_at" placeholder="例:1940-11-11" value="{{ Request::old('birth_at') }}" class="form-control{{ $errors->has('birth_at') ? ' err' : '' }}" />
        @if ($errors->has('birth_at'))
        <p class="err_message"><span>{{ $errors->first('birth_at') }}</span></p>
        @endif
      </div>

      <label for="" class="control-label col-md-2">性別 <span class="text-danger">※</span></label>
      <div class="col-md-4">
        <select  name="sex" class="form-control{{ $errors->has('sex') ? ' err' : '' }}">
          <option value="">選択してください</option>
          @foreach(App\Staff::getSexs() as $sex)
            <option value="{{ $sex }}"@if(Request::old('sex') == $sex) selected="selected"@endif>{{ $sex }}</option>
          @endforeach
        </select>
        @if ($errors->has('sex'))
        <p class="err_message"><span>{{ $errors->first('sex') }}</span></p>
        @endif
      </div>
    </div>

    <div class="form-group">
      <label for="" class="control-label col-md-2">都道府県 <span class="text-danger">※</span></label>
      <div class="col-md-4">
        <input type="hidden" name="prefecture" value="鳥取県">
        鳥取県
      </div>

      <label for="" class="control-label col-md-2">エリア <span class="text-danger">※</span></label>
      <div class="col-md-4">
        <select  name="area" class="form-control{{ $errors->has('prefecture') ? ' err' : '' }}">
          <option value="">選択してください</option>
          @foreach(App\Staff::getAreas() as $area)
            <option value="{{ $area }}"@if(Request::old('area') == $area) selected="selected"@endif>{{ $area }}</option>
          @endforeach
        </select>
        @if ($errors->has('area'))
        <p class="err_message"><span>{{ $errors->first('area') }}</span></p>
        @endif
      </div>
    </div>

    <div class="form-group">
      <label for="" class="control-label col-md-2">画像 <span class="text-danger">※</span></label>
      <div class="col-md-4">
        <input type="file" name="image" class="form-control">
        @if ($errors->has('image'))
        <p class="err_message"><span>{{ $errors->first('image') }}</span></p>
        @endif
      </div>

      <label for="" class="control-label col-md-2">プロフィール <span class="text-danger">※</span></label>
      <div class="col-md-4">
        <textarea name="description" placeholder="プロフィール" class="form-control{{ $errors->has('description') ? ' err' : '' }}">{{ Request::old('description') }}</textarea>
        @if ($errors->has('description'))
        <p class="err_message"><span>{{ $errors->first('description') }}</span></p>
        @endif
      </div>
    </div>

    <h3>サービス</h3>
    <div class="form-group">
      <label for="" class="control-label col-md-2">サービス名 <span class="text-danger">※</span></label>
      <div class="col-md-4">
        <input name="service[name]" placeholder="サービス名" class="form-control{{ $errors->has('service.name') ? ' err' : '' }}" value="{{ Request::old('service.name') }}" />
        @if ($errors->has('service.name'))
        <p class="err_message"><span>{{ $errors->first('service.name') }}</span></p>
        @endif
      </div>

      <label for="" class="control-label col-md-2">カテゴリ <span class="text-danger">※</span></label>
      <div class="col-md-4">
        <select name="service[category]" class="form-control{{ $errors->has('service.category') ? ' err' : '' }}">
          <option value="">選択してください</option>
          @foreach ($categories as $category)
            @if ($category->children)
              <optgroup label="{{ $category->name }}">
                @foreach ($category->children as $child)
                  <option value="{{ $child->id }}"@if (Request::old('service.category') == $child->id) selected="selected"@endif>{{ $child->name }}</option>
                @endforeach
              </optgroup>
            @else
              <option value="{{ $category->id }}"@if (Request::old('service.category') == $category->id) selected="selected"@endif>{{ $category->name }}</option>
            @endif
          @endforeach
        </select>
        @if ($errors->has('service.category'))
        <p class="err_message"><span>{{ $errors->first('service.category') }}</span></p>
        @endif
      </div>
    </div>

    <div class="form-group">
      <label for="" class="control-label col-md-2">時給 <span class="text-danger">※</span></label>
      <div class="col-md-4">
        <input name="service[price]" placeholder="時給" class="form-control{{ $errors->has('service.price') ? ' err' : '' }}" value="{{ Request::old('service.price') }}" />
        @if ($errors->has('service.price'))
        <p class="err_message"><span>{{ $errors->first('service.price') }}</span></p>
        @endif
      </div>

      <label for="" class="control-label col-md-2">最高時間 <span class="text-danger">※</span></label>
      <div class="col-md-4">
        <input name="service[max_hours]" placeholder="最高時間" class="form-control{{ $errors->has('service.max_hours') ? ' err' : '' }}" value="{{ Request::old('service.max_hours') }}" />
        @if ($errors->has('service.max_hours'))
        <p class="err_message"><span>{{ $errors->first('service.max_hours') }}</span></p>
        @endif
      </div>
    </div>

    <div class="form-group">
      <label for="" class="control-label col-md-2">詳細な場所 <span class="text-danger">※</span></label>
      <div class="col-md-4">
        <input name="service[location]" placeholder="住所" class="form-control{{ $errors->has('service.location') ? ' err' : '' }}" value="{{ Request::old('service.location') }}" />
        @if ($errors->has('service.location'))
        <p class="err_message"><span>{{ $errors->first('service.location') }}</span></p>
        @endif
      </div>

      <label for="" class="control-label col-md-2">詳細説明 <span class="text-danger">※</span></label>
      <div class="col-md-4">
        <textarea name="service[description]" placeholder="詳細説明" class="form-control{{ $errors->has('service.description') ? ' err' : '' }}">{{ Request::old('service.description') }}</textarea>
        @if ($errors->has('service.description'))
        <p class="err_message"><span>{{ $errors->first('service.description') }}</span></p>
        @endif
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-offset-2 col-md-10">
        <p class="help-block">次に進むことで、<a href="{{ route('static.agreement') }}" target="_blank">利用規約</a>に同意し、ご了承いただいたものとします。</p>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-offset-2 col-md-10">
        <button type="submit" name="submit" id="btn_regist" class="btn btn-success btn-block"><span>登録する</span></button>
      </div>
    </div>
  {!! Form::close() !!}

</div>
@endsection
