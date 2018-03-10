@extends('layout.master')

<?php

    $layout = [
        'title' => '特定商取引法に基づく表記',
        'description' => '○○のページです。',
        'js' => [],
    ];

?>

@section('content')

<div class="container">
  <div class="page-header">
    <h1>特定商取引法に基づく表記</h1>
  </div>

    <div class="row">
      <label class="control-label col-md-4">運営会社</label>
      <div class="col-md-8">
        株式会社eBaseSolutionsLaboratory
      </div>
    </div>
    <div class="row">
      <label class="control-label col-md-4">運営責任者</label>
      <div class="col-md-8">
        渡邉隼基
      </div>
    </div>
    <div class="row">
      <label class="control-label col-md-4">所在地・連絡先</label>
      <div class="col-md-8">
        鳥取県米子市車尾南1-342-1<br>
        <a href="{{ route('contact.index') }}">お問い合わせフォーム</a> からお問い合わせください。
      </div>
    </div>
    <div class="row">
      <label class="control-label col-md-4">営業時間</label>
      <div class="col-md-8">
        平日（9:00 〜18:00）（土・日・祝日は休み）
      </div>
    </div>
    <div class="row">
      <label class="control-label col-md-4">販売価格</label>
      <div class="col-md-8">
        商品ごとに表示された金額と致します（表示価格は消費税込みの金額です）。
      </div>
    </div>
    <div class="row">
      <label class="control-label col-md-4">商品価格以外に必要な料金</label>
      <div class="col-md-8">
        サービス利用料<br>
        購入申込が成立した際に、ホスト（サービス発行者）の方から、1決済あたり決済金額の20%をサービス利用料としてお支払いいただきます。
      </div>
    </div>
    <div class="row">
      <label class="control-label col-md-4">支払い方法について</label>
      <div class="col-md-8">
        クレジットカード（VISA/MasterCard）でのお支払いが可能です。
      </div>
    </div>
    <div class="row">
      <label class="control-label col-md-4">支払い時期</label>
      <div class="col-md-8">
        商品（サービス）購入の前
      </div>
    </div>
    <div class="row">
      <label class="control-label col-md-4">商品の提供時期</label>
      <div class="col-md-8">
        商品（サービス）購入申込時に指定した日時
      </div>
    </div>
    <div class="row">
      <label class="control-label col-md-4">キャンセル時の対応</label>
      <div class="col-md-8">
        商品（サービス）購入後のキャンセルはできません。ただし、支払済のチケットに記載の内容が、ホスト（サービス発行者）の都合によって提供されなかった場合、速やかに事実関係を調査した上で返金いたします。
      </div>
    </div>
    <div class="row">
      <label class="control-label col-md-4">個人情報の取扱いについて</label>
      <div class="col-md-8">
        個人情報の取扱いに関しては、<a href="{{ route('static.privacy') }}">プライバシーポリシー</a> をご参照ください。
      </div>
    </div>

</div>

@endsection
