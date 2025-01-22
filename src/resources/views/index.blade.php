@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css')}}">
@endsection

@section('link')
  {{-- <div class="header__nav"> --}}
    <form class="form" action="{{ route('search') }}" method="get">
      @csrf
      <input type="text"  name="query" class="search-form" placeholder="何をお探しですか" value="{{request('query')}}">
    </form>

    <form class="form" action="/logout" method="post">
      @csrf
      <a link="/"  class="header-nav__logout">logout</a>
    </form>

    <form class="form" action="/" method="">
      @csrf
      <a link="" class="header-nav__mypage">マイページ</a>
    </form>
  <div class="header-nav__sell">
    <button class="header__button-sell" type="button" onclick="location.href='/'sell">出品</button>
  </div>
@endsection

@section('content')
<div class="container">

    <div id="recommendations">
      <div id="favorites">

      <ul id="tab">
        <li class="tab-recommendation"><a href="#recommendations">おすすめ</a></li>
        <li class="tab-favorites"><a href="#favorites">マイリスト</a></li>
      </ul>

      <div class="contents">

        <div class="recommendations">
            <ul class="product-container">
            @foreach($products as $product)
            <li class="product-item">
              <a href="{{ route('item.show', $product->id) }}">
                <img class="product-image" src="{{ $product->image }}" alt="{{ $product->name }}">
                <h3 class="product-name">{{ $product->name }}</h3>
              </a>
            </li>
              @endforeach
            </ul>
        </div>


        <div class="favorites">
         <section>

          <h1>XHTML</h1>
          <p>...省略...</p>

         </section>
        </div>
         </div>

@endsection