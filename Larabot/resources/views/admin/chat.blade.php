@extends('layout')
@section('content')
    <form action="{{route('send', $chat->id)}}" method="post" class="mw-500 mx-auto form">
        @csrf
        <h1 class="px-10 fz-20 border">Сообщение для {{$chat->name}}</h1>
        <div class="column px-10 border">
            <label for="text">Сообщение</label>
            <textarea id="text"  name="text" >{{old('text')}}</textarea>
        </div>
        <input type="hidden" name="id" value="{{$chat->id}}">
        <input type="hidden" name="chat_id" value="{{$chat->chat_id}}">
        <div class="column">
            <button type="submit" class="px-10 text-center">отправить</button>
        </div>
    </form>
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif
@endsection
