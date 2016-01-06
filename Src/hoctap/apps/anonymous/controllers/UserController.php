<?php

namespace hoctap\Anonymous\Controllers;

use hoctap\Anonymous\Controllers\ControllerBase;
use hoctap\Anonymous\Models\Users;

class UserController extends ControllerBase {
	public function initialize() {
		parent::initialize ();
	}
	public function indexAction() {
	}
	public function registerAction() {
		if ($this->request->isPost ()) {
			$newUser = new Users ();
			$newUser->user_name = $this->request->getPost ( 'user_name' );
			$newUser->first_name = $this->request->getPost ( 'first_name' );
			$newUser->email = $this->request->getPost ( 'email' );
			$passwordText = $this->request->getPost ( 'password' );
			$newUser->id = 1;
			$password = md5 ( $passwordText, false );
			$newUser->password = $password;
			if (! $newUser->save ()) {
				foreach ( $newUser->getMessages () as $message ) {
					$this->flash->error ( $message );
				}
				return $this->dispatcher->forward ( array (
						'module' => 'anonymous',
						"controller" => "user",
						"action" => "register" 
				) );
			}
			$this->flash->success ( "user was created successfully" );
			
			return $this->dispatcher->forward ( array (
					"module" => 'student',
					"controller" => "index",
					"action" => "index" 
			) );
		}
	}
	public function loginAction() {
	}
}

