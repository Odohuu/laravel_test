@extends('layouts.app')

@section('content')

<h1>Edit User</h1>
<form method="POST" action="{{ action('UserController@update', [ 'id' => $user->id ]) }}">
    <ul>
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" >
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
            <a class="btn" href="{{ action('UserController@index', ['id' =>  $user->id]) }}" role="button">Болих</a></td>
        </li>
    </ul>
</form>

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop