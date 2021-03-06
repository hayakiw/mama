@extends('layout.master')

<?php

    $layout = [
        'title' => 'プライバシーポリシー',
        'description' => '○○のページです。',
        'js' => [],
    ];

?>

@section('content')

<div class="container">
  <div class="page-header">
    <h1>プライバシーポリシー</h1>
  </div>

株式会社eBaseSolutionsLaboratory（以下，「当社」といいます。）は，本ウェブサイト上で提供するサービス（以下,「本サービス」といいます。）におけるプライバシー情報の取扱いについて，以下のとおりプライバシーポリシー（以下，「本ポリシー」といいます。）を定めます。

      <h3>第1条（プライバシー情報）</h3>
      <ol>
        <li>プライバシー情報のうち「個人情報」とは，個人情報保護法にいう「個人情報」を指すものとし，生存する個人に関する情報であって，当該情報に含まれる氏名，生年月日，住所，電話番号，連絡先その他の記述等により特定の個人を識別できる情報を指します。</li>
        <li>プライバシー情報のうち「履歴情報および特性情報」とは，上記に定める「個人情報」以外のものをいい，ご利用いただいたサービスやご購入いただいた商品，ご覧になったページや広告の履歴，ユーザーが検索された検索キーワード，ご利用日時，ご利用の方法，ご利用環境，郵便番号や性別，職業，年齢，ユーザーのIPアドレス，クッキー情報，位置情報，端末の個体識別情報などを指します。</li>
      </ol>

      <h3>第2条（個人情報の第三者提供）</h3>
      <ol>
        <li>当社は，次に掲げる場合を除いて，あらかじめユーザーの同意を得ることなく，第三者に個人情報を提供することはありません。ただし，個人情報保護法その他の法令で認められる場合を除きます。<br>
（1）法令に基づく場合<br>
（2）人の生命，身体または財産の保護のために必要がある場合であって，本人の同意を得ることが困難であるとき<br>
（3）公衆衛生の向上または児童の健全な育成の推進のために特に必要がある場合であって，本人の同意を得ることが困難であるとき<br>
（4）国の機関もしくは地方公共団体またはその委託を受けた者が法令の定める事務を遂行することに対して協力する必要がある場合であって，本人の同意を得ることにより当該事務の遂行に支障を及ぼすおそれがあるとき<br>
（5）予め次の事項を告知あるいは公表をしている場合<br>
利用目的に第三者への提供を含むこと<br>
第三者に提供されるデータの項目<br>
第三者への提供の手段または方法<br>
本人の求めに応じて個人情報の第三者への提供を停止すること</li>
        <li>前項の定めにかかわらず，次に掲げる場合は第三者には該当しないものとします。<br>
（1）当社が利用目的の達成に必要な範囲内において個人情報の取扱いの全部または一部を委託する場合<br>
（2）合併その他の事由による事業の承継に伴って個人情報が提供される場合<br>
（3）個人情報を特定の者との間で共同して利用する場合であって，その旨並びに共同して利用される個人情報の項目，共同して利用する者の範囲，利用する者の利用目的および当該個人情報の管理について責任を有する者の氏名または名称について，あらかじめ本人に通知し，または本人が容易に知り得る状態に置いているとき</li>
      </ol>


      <h3>第3条（個人情報の訂正および削除）</h3>
      <ol>
        <li>ユーザーは，当社の保有する自己の個人情報が誤った情報である場合には，当社が定める手続きにより，当社に対して個人情報の訂正または削除を請求することができます。</li>
        <li>当社は，ユーザーから前項の請求を受けてその請求に応じる必要があると判断した場合には，遅滞なく，当該個人情報の訂正または削除を行い，これをユーザーに通知します。</li>
      </ol>

      <h3>第4条（プライバシーポリシーの変更）</h3>
      <ol>
        <li>本ポリシーの内容は，ユーザーに通知することなく，変更することができるものとします。</li>
        <li>当社が別途定める場合を除いて，変更後のプライバシーポリシーは，本ウェブサイトに掲載したときから効力を生じるものとします。</li>
      </ol>

      <h3>第5条（お問い合わせ窓口）</h3>
      当サイトのプライバシーポリシーに関するお問い合わせは、下記お問い合わせフォームからお願い致します。<br>
      <a href="{{ route('contact.index') }}">お問い合わせ</a>
</div>

@endsection
