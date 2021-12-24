@extends('layouts.layout')

@section('content')
    <div class="big-text">Авторизация для администратора</div>
    <form class="form" method="post">
        @error('authError')
        <div class="form-item error">{{$message}}</div>
        @enderror
        @csrf
        <div class="form-item">
            @error('login')
            <div class="error">{{$message}}</div>
            @enderror
            <div>Логин</div>
            <input type="text" name="login">
        </div>
        <div class="form-item">
            @error('password')
            <div class="error">{{$message}}</div>
            @enderror
            <div>Пароль</div>
            <input type="password" name="password">
        </div>
        <div class="form-item">
            <button>Войти</button>
        </div>
    </form>
@endsection
