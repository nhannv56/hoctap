<?php
use Phalcon\Mvc\Controller;
class ControllerBase extends Controller {
	/**
	 * Init function for base controller
	 */
	public function initialize() {
		$this->tag->prependTitle ( "Học tập" );
	}
	/**
	 * forward user to a uri
	 * 
	 * @param array $uri        	
	 */
	public function forward($uri) {
		$uriParts = explode ( '/', $uri );
		$params = array_slice ( $uriParts, 2 );
		return $this->dispatcher->forward ( array (
				'controller' => $uriParts [0],
				'action' => $uriParts [1],
				'param' => $params 
		) );
	}
}
