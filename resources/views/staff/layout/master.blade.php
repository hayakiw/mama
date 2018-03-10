<!DOCTYPE HTML>
<html lang="ja"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="{{ asset ('img/favicon.ico') }}">
    <meta name="description" content="{{ isset($layout['description']) && $layout['description'] ? $layout['description'] : '' }}">
    <meta name="keywords" content="" lang="ja">
    <title>{{ $layout['title'] ? $layout['title'] . '｜' : '' }}スタッフ ｜ みんなのお父さん ｜ Dojo</title>

    <meta name="viewport" content="width=device-width">
    <meta name="format-detection" content="telephone=no">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css" >
    <link rel="stylesheet" href="{{ asset('css/stylesheets.css') }}" type="text/css" >
    <link rel="stylesheet" href="{{ asset('css/staff/stylesheets.css') }}" type="text/css" >

    <!--[if lt IE 9]>
    <script type="text/javascript" src="{{ asset('js/html5shiv.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/respond.min.js') }}"></script>
    <![endif]-->
  </head>
  <body>

  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-menu" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ route('root.index') }}"><div> <img src="{{ asset('img/logo.png') }}?18" alt=""></div></a>
      <a class="navbar-brand title" href="{{ route('staff.root.index') }}">スタッフ用画面</a>
      </div>
      <div class="collapse navbar-collapse" id="navbar-menu">
        @if (Auth::guard('staff')->check())
        <ul class="nav navbar-nav">
          <li><a href="{{ route('staff.item.index') }}">サービス管理</a></li>
          <li><a href="{{ route('staff.orders.index') }}">依頼管理</a></li>
        </ul>
        @endif
        <ul class="nav navbar-nav navbar-right">
          @if (Auth::guard('staff')->check())
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user"></i> {{ Auth::guard('staff')->user()->email }} <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="{{ route('staff.user.show') }}"><i class="fa fa-user"></i> 会員情報</a></li>
                <li><a href="{{ route('staff.auth.signout') }}"><i class="fa fa-sign-out"></i> ログアウト</a></li>
              </ul>
            </li>
          @else
          <li><a href="{{ route('staff.auth.signin') }}" class="exhibit">ログイン</a></li>
          <li><a href="{{ route('staff.user.create') }}" class="exhibit">新規登録</a></li>
          @endif
        </ul>
      </div>
    </div>
    <!-- / .container -->
  </nav>
  <div class="content">
    @if (session('info'))
    <div class="alert alert-success alert-dismissible" role="alert">
      {{ session('info') }}
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
      {{ session('error') }}
    </div>
    @endif

    @yield('content')
  </div><!-- /.content -->

  <footer id="footer" class="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
        <ul class="utility">
          <li class="contact"><a href="{{ route('contact.index') }}">お問い合わせ</a></li>
          <li><a href="{{ route('static.agreement') }}" target="_blank">利用規約</a></li>
          <li><a href="{{ route('static.privacy') }}" target="_blank">プライバシーポリシー</a></li>
          <li><a href="{{ route('static.commercial') }}" target="_blank">特定商取引法に基づく表記</a></li>
        </ul>
        </div>

        <div class="col-md-4">
          <div class="title">安心・安全</div>
          <div class="description">全ての報酬は、事務局を経由し、完了後に振り込まれます。<br>
トラブルを防止するために、直接の連絡先の交換、契約はご遠慮いただいています。
連絡先の交換が必要な場合は必ずお問い合わせください</div>
        </div>

        <div class="col-md-1">
        </div>

        <div class="col-md-3">
          <div class="title">お支払い</div>
          <div class="description">お支払いは、クレジットカードがご利用いただけます。<br>
すべてPay.jpを利用しての決済となりますので、当サイトがカード情報を保存することはありません。<br>
            <div class="credit">
            <img src="{{ asset('img/credit/visa.png') }}" width="40" alt="visa">
            <img src="{{ asset('img/credit/mastercard.png') }}" width="40" alt="mastercard">
            <img src="{{ asset('img/credit/jcb.png') }}" width="40" alt="jcb">
            <img src="{{ asset('img/credit/americanExpress.png') }}" width="40" alt="americanExpress">
            <img src="{{ asset('img/credit/dinersClub.png') }}" width="40" alt="dinersClub">
            <img src="{{ asset('img/credit/discover.png') }}" width="40" alt="discover">
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <span class="copyright"> copyright &copy; Dojo, All Rights Reserved. </span>
      </div>
    </div>
    <!-- / .container -->
  </footer>

  <script type="text/javascript" src="{{ asset('js/jquery-2.2.3.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/footerFixed.js') }}"></script>

  @if (isset($layout['js']))
  @foreach ($layout['js'] as $js)
  <script src="{{ asset('js/' . $js . '.js') }}"></script>
  @endforeach
  @endif

  </body>
</html>
