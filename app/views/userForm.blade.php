@if($GLOBALS['method']=='updateUser')
	{{Form::model($user, array('url' => array('user/update/'.$user->id),  $user->id))}}
@else

	{{Form::open(array('url' => array('user/create')))}}
@endif
	{{ Form::label('email', 'Email:') }}
	{{ Form::text('email') }}
	{{ Form::label('name', 'Name:') }}
	{{ Form::text('name') }}
	{{ Form::submit('submit') }}
{{ Form::close() }}

