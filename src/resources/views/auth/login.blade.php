@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css')}}">
@endsection


@section('content')
    <div class="register__content">
      <div class="register-form__heading">
        <h2>ログイン</h2>
      </div>

      <form action="/login" method="post" class="form">
      @csrf
      <div class="form__box">
        <div class="group">
          <div class="form__group-title">
            <span class="form__label--item">ユーザー名/メールアドレス</span>
          </div>

          <div class="form__group-content">
            <div class="form__input--text">
              <input type="text" name="name" value="{{ old('name')}}"required autofocus/>
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
            <span class="form__label--item">パスワード</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="password" name="password" value="{{ old('password') }}" required/>
            </div>
            <div class="form__error">
              @error('password')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>

        <div class="form__button">
          <button class="form__button-submit" type="submit">ログインする</button>
        </div>
      </div>
    </form>

        <div class="login__link">
          <a class="login__button-submit" href="/register">会員登録はこちら</a>
        </div>
    </div>
@endsection