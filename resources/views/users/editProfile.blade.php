@extends('layouts.app')

@section('content')

<h1>Edit User</h1>
<form method="PATCH" action="{{ action('UserController@update', [ 'id' => $user->id ]) }}">
    <ul>
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" >
        <li>
            <div class="form-group">
                <label for="name" class="control-label">Нэр:</label>
                <input class="form-control" type="file" name="avatar" >
            </div>
        </li>
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
            <button type="submit" class="btn btn-primary">Өөрчлөлтийг хадгалах</button>
            <a class="btn" href="{{ action('UserController@showProfile', ['id' =>  $user->id]) }}" role="button">Болих</a></td>
        </li>
    </ul>
</form>
<p><center>Want to change your profile photo? We pull from <a herf="http://en.gravatar.com/">gravatar.com</a></center></p>
@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop