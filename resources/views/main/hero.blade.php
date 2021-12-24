@extends('layouts.layout')

@section('content')
    <div class="big-text">Персонаж: {{$hero->name}}</div>
    <div class="hero-desc">
        <div>
            <div class="hero-item"><img class="hero-image" src="../../storage/app/public/{{$hero->image}}"></div>
        </div>
        <div>
            <div>День рождения:
                <div>{{$hero->birthday}}</div>
            </div>
            <div>Знак зодиака:
                <div>{{$hero->zodiac_sign}}</div>
            </div>
        </div>
    </div>
    <div>
        <div class="big-text">
            Как получить рут
        </div>
        @if($root)
            <div>
                {{$root->description}}
            </div>
        @endif
    </div>
@endsection
