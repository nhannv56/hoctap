<?php

namespace hoctap\Anonymous\Controllers;

use hoctap\Anonymous\Controllers\ControllerBase;
use hoctap\Anonymous\Models\Users;
use Phalcon\Http\Response;

class UserController extends ControllerBase {
	public function initialize() {
		parent::initialize ();
		$this->tag->setTitle ( 'Đăng ký người dùng mới' );
	}
	public function indexAction() {
	}
	public function registerAction() {
		if ($this->request->isPost ()) {
			$newUser = new Users ();
			$newUser->user_name = $this->request->getPost ( 'user_name' );
			$newUser->first_name = $this->request->getPost ( 'first_name' );
			$newUser->last_name = $this->request->getPost ( 'last_name' );
			$newUser->email = $this->request->getPost ( 'email' );
			$passwordText = $this->request->getPost ( 'password' );
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
			//redirect to other module cannot use forward
			$response = new Response (); 
			return $response->redirect ( 'student/index/' );
		}
	}
	public function loginAction() {
	}
}

