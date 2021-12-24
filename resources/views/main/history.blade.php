@extends('layouts.layout')

@section('content')
    <div class="big-text">История: {{$history->name}}</div>
    <div class="des">Описание:
        <div>{{$history->description}}</div>
    </div>
    <div>Герои:
        <div class="heroes">@foreach($heroes as $hero)
                <a href="{{'/hero/'.$hero->id}}" class="hero">
                    <div class="hero-item">Имя: {{$hero->name}}</div>
                    <div class="hero-item">День рождения: {{$hero->birthday}}</div>
                    <div class="hero-item">Знак зодиака: {{$hero->zodiac_sign}}</div>
                    <div class="hero-item"><img class="hero-image" src="../../storage/app/public/{{$hero->image}}"></div>
                </a>
            @endforeach</div>
    </div>
@endsection
