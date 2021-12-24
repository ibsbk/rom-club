@extends('layouts.layout')

@section('content')
    <div class="big-text">
        Добавление персонажа
    </div>
    <form method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-item">
            @error('name')
            <div class="error">
                {{$message}}
            </div>
            @enderror
            <div>Имя</div>
            <input type="text" name="name">
        </div>
        <div class="form-item">
            @error('birthday')
            <div class="error">
                {{$message}}
            </div>
            @enderror
            <div>День рождения</div>
            <input type="date" name="birthday">
        </div>
        <div class="form-item">
            @error('image')
            <div class="error">
                {{$message}}
            </div>
            @enderror
            <div>Картинка</div>
            <input type="file" name="image">
        </div>
        <div class="form-item">
            @error('history_id')
            <div class="error">
                {{$message}}
            </div>
            @enderror
            <div>История</div>
            <select name="history_id">
                @foreach($histories as $history)
                    <option value="{{$history->id}}">{{$history->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-item">
            @error('root')
            <div class="error">
                {{$message}}
            </div>
            @enderror
            <div>Рут</div>
            <textarea name="root"></textarea>
        </div>
        <div class="form-item">
            <button>Добавить</button>
        </div>
    </form>
@endsection
