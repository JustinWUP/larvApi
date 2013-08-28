<?php 

	class UserController extends BaseController {

		public function newUser()
		{

			return View::make('newUser');
		}

		public function editUser($user)
		{
			$user = User::find($user);
			return View::make('editUser', $user)->with('user', $user);
		}

		public function createUser()
		{
			// $user = User::create($_POST);
			$user = new User;
			//If you are posting this way through a web UI, it posts with a session token and it's annoying because there's no token column in your database probably.
			// if(!array_key_exists('json', $_POST)){
			// 	array_shift($_POST);
			// }
			foreach($_POST as $key=>$value){
				if($key!='json'&&$key!='_token'){
					$user->$key = $_POST[$key];
				}	
			}
			$user->save();
			if(sizeof($user->errors())>0){
				$action = array_key_exists('json', $_POST) ? $user->errors() : Redirect::to('/user/new')->withErrors($user->errors());
			}
			else{
				$action = array_key_exists('json', $_POST) ? 'You Saved It!' : Redirect::to('/')->with('message','You Saved It');
			}
			
			return $action;

		}

		public function updateUser($user)
		{
			$user = User::find($user);
			// if(!array_key_exists('json', $_POST)){
			// 	array_shift($_POST);
			// }
			foreach($_POST as $key=>$value){
				if($key!='json'&&$key!='_token'){
					$user->$key = $_POST[$key];
				}	
			}
			$user->save();
			if(sizeof($user->errors())>0){
				$action = array_key_exists('json', $_POST) ? $user->errors() : Redirect::to('/user/edit/'.$user->id)->withErrors($user->errors());
			}
			else{
				$action = array_key_exists('json', $_POST) ? 'You Saved It!' : Redirect::to('/')->with('message', 'You Saved It');
			}
			return $action;
		}

		public function destroyUser($user)
		{
			$user = User::find($user);
			$user->delete();
			$action = array_key_exists('json', $_POST) ? 'saved' : Redirect::to('/')->with('message', 'saved');
			return $action;
		}

		public function showJSON(){
			$user = array_key_exists('id', $_POST) ?  $_POST['id']: null;
			if($user!=null){
				$response = User::find($user);
				if($response == null){
					$response = ['error'=> 'User Not Found'];
				}
				else {
					$response->message = 'Yep';
				}
			}
			else{
				$response = User::all();
			}
			return $response;
		}
	}
?>
