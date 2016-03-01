@extends('layouts.app')

@section('content')

<h1>Edit User</h1>
<form method="POST" action="{{ action('UserController@update', [ 'id' => $user->id ]) }}">
    <ul>
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <!-- <li>
            <div class="form-group">
                <label for="name" class="control-label">Нэр:</label>
                <input class="form-control" type="file" name="avatar" >
            </div>
        </li> -->
        <li>
            <div class="form-group">
                <label for="name" class="control-label">Нэр:</label>
                <input class="form-control" type="text" name="name" value="{{ $user->name  }}" >
            </div>
        </li>
        <li>
            <div class="form-group">
                <label for="email" class="control-label">Имэйл:</label>
                <input class="form-control" type="email" name="email" value="{{ $user->email }}">
            </div>
        </li>
        <li>
            <div class="form-group">
                <label class="control-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
        </li>
        <li>
            <div class="form-group">
                <label class="control-label">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation">
            </div>
        </li>
        <li>
            <button type="submit" class="btn btn-primary">Өөрчлөлтийг хадгалах</button>
            <a class="btn" href="{{ action('UserController@showProfile', ['id' =>  $user->id]) }}" role="button">Болих</a></td>
        </li>
    </ul>
</form>
<p><center>Want to change your profile photo? We pull from <a herf="http://en.gravatar.com/">gravatar.com</a></center></p>
@if ($errors->any())
    <ul>
        {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
    </ul>
@endif

@stop