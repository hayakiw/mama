@extends('layout.master')

<?php

    $layout = [
        'left_search' => false,
        'title' => 'サービス一覧',
        'description' => 'サービス一覧を表示しています。',
    ];

?>

@section('content')


    <section class="service-list">
      <div class="headline">
        <h2>サービス一覧</h2>
      </div>
      <div class="container">
        <div class="row">
          @foreach(App\Category::topCategories() as $category)
          <div class="survice-column">
            <div class="text-center">
              <h3>{{ $category->name }}</h3>
            </div>
            <ul>
              @foreach($category->children as $child)
              <li><a href="{{ route('item.index', ['category' => $child->id ]) }}">{{ $child->name }}</a></li>
              @endforeach
            </ul>
          </div>
          <!-- / .survice-column -->
          @endforeach
        </div>
        <!-- / .row -->
      </div>
      <!-- / .container -->
    </section>
    <!-- / .service-list -->

    <section class="staff-list">
      <div class="headline">
      </div>
      <div class="container">
        <div class="row">
          @foreach($items as $item)
          <div class="col-sm-6 col-md-3">
            <div class="thumbnail"> <img src="{{ $item->staff->imageUrl() }}" alt="" >
              <div class="caption">
                <h3>{{ str_limit($item->title, 10) }}</h3>
                <p>{!! nl2br(e(mb_strim($item->description, 0, 80))) !!}</p>
                <p>時給 {{ $item->price }}円</p>
                <p>場所 {{ $item->location }}</p>
                <p><a href="{{ route('item.show', ['item' => $item->id ]) }}" class="btn btn-primary" role="button">詳細</a>
                  <!-- <a href="#" class="btn btn-default" role="button">Button</a> -->
                </p>
              </div>
              <!-- / .caption -->
            </div>
            <!-- / thumbnail. -->
          </div>
          <!-- / .col- -->
          @endforeach
        </div>
        <!-- / .row -->
        <div class="text-center">
          {!! $items->links() !!}
        </div>

      </div>
      <!-- / .container -->
    </section>
@endsection
