@extends('layouts.app')
@section('content')
            
<h1>Create User</h1>

<form method="POST" action="{{ action('UserController@store') }}">
    <ul>
        
        <li>
            <div class="form-group">
                <label for="name" class="control-label">Нэр:</label>
                <input class="form-control" type="text" name="name" value="{{ old('name') }}" >
            </div>
        </li>

        <li>
            <div class="form-group">
                <label for="email" class="control-label">Нэр:</label>
                <input class="form-control" type="text" name="email" value="{{ old('email') }}" >
            </div>
        </li>

        <li>
            <div class="form-group">
                <label for="password" class="control-label">Нэр:</label>
                <input class="form-control" type="text" name="password" value="{{ old('password') }}" >
            </div>
        </li>

        <li>
            <div class="form-group">
                <label for="password" class="control-label">Нэр:</label>
                <input class="form-control" type="text" name="password" value="{{ old('password') }}" >
            </div>
        </li>        

        <li>
            <button type="submit" class="btn btn-primary">Үүсгэх</button>
        </li>
    </ul>
</form>

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop