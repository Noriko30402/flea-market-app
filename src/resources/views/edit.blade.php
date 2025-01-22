@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/edit.css')}}">
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
    <div class="register__content">
      <div class="register-form__heading">
        <h2>プロフィール設定</h2>
      </div>

      <form action="/edit" method="post" class="form">
      @csrf

      <div class="profile-container"> 
        <img src="" alt="" class="profile-img" >
         <button type="button"  class="img-input">画像を選択</button>
      </div>

      <div class="form__box">
        <div class="group">
          <div class="form__group-title">
            <span class="form__label--item">ユーザー名</span>
          </div>

          <div class="form__group-content">
            <div class="form__input--text">
              <input type="text" name="name" value="{{ old('name')}}">
            </div>
            <div class="form__error">
              @error('name')
              {{ $message}}
              @enderror
            </div>
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">郵便番号</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="postcode" name="postcode" value="{{ old('postcode') }}" />
            </div>
            <div class="form__error">
              @error('postcode')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">住所</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="address" name="address" />
            </div>
            <div class="form__error">
              @error('address')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">建物名</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="building" name="building" />
            </div>
          </div>
        </div>

        <div class="form__button">
          <button class="form__button-submit" type="submit">更新する</button>
        </div>
      </div>
    </form>

    </div>
@endsection