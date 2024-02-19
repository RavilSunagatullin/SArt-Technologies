@extends('layout')
@section('content')
    <table style="width: 100%;  max-width: 1760px; margin: 46px auto; ">
        <thead>
        <tr>
            <td>Имя</td>
            <td>Send message</td>
            <td>Delete</td>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user )
            <tr>
                <td>{{$user->name}}</td>
                <td><a href="{{route('chat', $user->id)}}">Send message</a></td>
                <td>
                    <form action="{{route('delete',  $user->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit">delete</button>
                    </form></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

