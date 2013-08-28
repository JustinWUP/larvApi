@extends('layout')

@section('content')
@foreach($users as $user)
	{{$user->name}}
	<a href="/user/edit/{{$user->id}}">Edit</a><br>
@endforeach

<a href="/user/new">Add a user</a><br>

@stop