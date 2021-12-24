@extends('layouts.layout')

@section('content')
    <div class="big-text">
        Добавление истории
    </div>
    <form method="post">
        @csrf
        <div class="form-item">
            @error('name')
            <div class="error"></div>
            @enderror
            <div>Название</div>
            <input type="text" name="name">
        </div>
        <div class="form-item">
            @error('description')
            <div class="error"></div>
            @enderror
            <div>Описание</div>
            <textarea name="description"></textarea>
        </div>
        <div class="form-item">
            <button>Добавить</button>
        </div>
@endsection
