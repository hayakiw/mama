@extends('staff.layout.master')

<?php

    $layout = [
        'left' => true,
        'user' => true,
        'title' => '基本情報',
    ];

?>

@section('content')

<div class="container">
  <div class="page-header">
    <h1>基本情報設定</h1>
  </div>

  {{ Form::model($user, ['route' => 'staff.user.update', 'method' => 'put', 'files' => true, 'class' => 'form-horizontal']) }}

    <div class="form-group">
      <label for="" class="control-label col-md-2">姓 <span class="text-danger">※</span></label>
      <div class="col-md-4">
        <input type="text" name="last_name" placeholder="姓" value="{{ Request::old('last_name') ?: $user->last_name }}" class="form-control{{ $errors->has('last_name') ? ' err' : '' }}" />
        @if ($errors->has('last_name'))
        <p class="err_message"><span>{{ $errors->first('last_name') }}</span></p>
        @endif
      </div>

      <label for="" class="control-label col-md-2">名 <span class="text-danger">※</span></label>
      <div class="col-md-4">
        <input type="text" name="first_name" placeholder="名" value="{{ Request::old('first_name') ?: $user->first_name }}" class="form-control{{ $errors->has('first_name') ? ' err' : '' }}" />
        @if ($errors->has('first_name'))
        <p class="err_message"><span>{{ $errors->first('first_name') }}</span></p>
        @endif
      </div>
    </div>

    <div class="form-group">
      <label for="" class="control-label col-md-2">生年月日 <span class="text-danger">※</span></label>
      <div class="col-md-4">
        <input type="date" name="birth_at" placeholder="例:1940-11-11" value="{{ Request::old('birth_at') ?: $user->birth_at }}" class="form-control{{ $errors->has('birth_at') ? ' err' : '' }}" />
        @if ($errors->has('birth_at'))
        <p class="err_message"><span>{{ $errors->first('birth_at') }}</span></p>
        @endif
      </div>

      <label for="" class="control-label col-md-2">性別 <span class="text-danger">※</span></label>
      <div class="col-md-4">
        <?php $sexOld = Request::old('sex') ?: $user->sex;?>
        <select  name="sex" class="form-control{{ $errors->has('sex') ? ' err' : '' }}">
          <option value="">選択してください</option>
          @foreach(App\User::getSexs() as $sex)
            <option value="{{ $sex }}"@if($sexOld == $sex) selected="selected"@endif>{{ $sex }}</option>
          @endforeach
        </select>
        @if ($errors->has('sex'))
        <p class="err_message"><span>{{ $errors->first('sex') }}</span></p>
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
        @if ($user->image)
        <div class="col-md-8">
          <div class="thumbnail">
            <img src="{{ asset($user->imageUrl()) }}" alt="" class="img-thumbnail small">
          </div>
        </div>
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
        <?php $areaOld = Request::old('area') ?: $user->area;?>
        <select  name="area" class="form-control{{ $errors->has('prefecture') ? ' err' : '' }}">
          <option value="">選択してください</option>
          @foreach(App\Staff::getAreas() as $area)
            <option value="{{ $area }}"@if($areaOld == $area) selected="selected"@endif>{{ $area }}</option>
          @endforeach
        </select>
        @if ($errors->has('area'))
        <p class="err_message"><span>{{ $errors->first('area') }}</span></p>
        @endif
      </div>
    </div>

    <div class="form-group">
      <label for="" class="control-label col-md-2">プロフィール <span class="text-danger">※</span></label>
      <div class="col-md-4">
        <textarea name="description" placeholder="プロフィール" class="form-control{{ $errors->has('description') ? ' err' : '' }}">{{ Request::old('description') ?: $user->description }}</textarea>
        @if ($errors->has('description'))
        <p class="err_message"><span>{{ $errors->first('description') }}</span></p>
        @endif
        </div>
    </div>


    <div class="form-group">
      <div class="col-md-offset-2 col-md-10">
        <button type="submit" id="btn_reset" class="btn btn-success btn-block">変更する</button>
        <a href="{{ route('staff.user.show') }}" class="btn btn-secondary">戻る</a>
      </div>
    </div>
  </div>
  {{ Form::close() }}

</div>

@endsection
