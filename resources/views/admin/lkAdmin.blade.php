@extends('layouts.layout')

@section('content')
    <div class="big-text">Личный кабинет</div>
    <div class="admins">
        <span><a href="{{route('createHero')}}">добавить героя</a></span>
        <span><a href="{{route('createHistory')}}">добавить историю</a></span>
    </div>
@endsection
