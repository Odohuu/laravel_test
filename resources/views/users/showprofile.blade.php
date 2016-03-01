@extends('layouts.app')
@section('content')



<div class="row">
        <h1>Хэрэглэгч</h1>
        <div>
            <img src="{{ $gravatar }}" alt="{{ $user->name }}" />
            <!-- <img src="{{ Avatar::create($user->name)->toBase64() }}" /> -->
        </div>
        <div>{{ $user->name }}</div>
        <div>{{ $user->email }}</div>
</div>
@stop