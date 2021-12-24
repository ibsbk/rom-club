@extends('layouts.layout')

@section('content')
    <div class="big-text">Истории</div>
    <div class="histories">
        @foreach($histories as $history)
            <a href="{{'/history/'.$history->id}}" class="history">
                <div>{{$history->name}}</div>
            </a>
        @endforeach
    </div>
@endsection
