@extends('layouts.app')
@section('content')

<h1>Хэрэглэгч</h1>

<div class="row">
    <div class="container">
        <a class="btn btn-default" href="/register">Үүсгэх</a>
    </div>
</div>
@if ($users->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Нэр</th>
                <th>И-мэйл</th>
                <!--<th>Нууц үг</th>-->
                <th>Засах</th>
                <th>Устгах</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <!--<td>{{ $user->password }}</td>-->
                    <td><a class="btn btn-info" href="{{ url('users/'. $user->id. '/edit', '') }}" role="button">Засах</a></td>
                    <td>
                        <a class="btn btn-danger" href="{{ action('UserController@destroy', ['id' =>  $user->id]) }}" role="button">Устгах</a></td>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
@else
    There are no users
@endif

@stop