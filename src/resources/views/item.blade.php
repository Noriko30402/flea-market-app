@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css')}}">
@endsection

@section('link')
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
<div class="product">
  <div class="product-image">
    <img src="{{ $product->image }}" alt="{{ $product->name }}">
  </div>
  <div class="product detail">
    <h1 class="product-name">{{ $product->name }}</h1>
    <p class="product-price">¥{{ $product->price }}(税込)</p>
    <h3>商品説明</h3>

    <form action="{{ route('favorite.store') }}" method="POST">
      @csrf
      <input type="hidden" name="item_id" value="{{ 'favorites'}}">
      <button type="submit">★</button>
    </form>

    <p class="product-description">{{$product->description}}</p>
    <h3>商品の情報</h3>
    <table>
      <tr>
        <th>カテゴリー</th>
        @foreach($product->categories as $category)
        <td class="confirm-table__category">{{ $category->name }}</td>
        <input type="hidden" name="category_ids[]" value="{{ $category->id }}">
        @endforeach
      </tr>
      <tr>
        <th>商品の状態</th>
      <td class="confirm-table__condition">{{ $condition->name }}
        <input type="hidden" name="" value="{{ $product['condition_id']}}">
      </td>
    </tr>
    </table>
  </div>

  
          {{-- <td class="product-table__item">
            <form action='' method="get"  class="product-table__form">
              @csrf
              <div class="product-form__item">
                <input type="text" class="product-form__item-input" name="content" value="{{$todo['content']}}">
                <input type="hidden" name="id" value="{{ $todo['id']}}">
              </div>

              <div class="update-form__item">
                <p class="update-form__item-p">{{ $todo['category']['name']}}</p>
              </div>
              <div class="update-form__button">
                <button class="update-form__button-submit" type="submit">更新</button>
              </div>
            </form>
          </td>
  
          <td class="todo-table__item">
            <form  action="/todos/delete" method="POST" class="delete-form">
              @method('DELETE')
              @csrf
              <div class="delete-form__button">
                <button class="delete-form__button-submit" type="submit">削除</button>
              </div>
              </form>
            </td>
          </tr>
   --}}
@endsection