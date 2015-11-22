<?php
namespace hoctap\Student\Controllers;
use Phalcon\Mvc\Controller;
const WEB_TITLE = "Diễn đàn học tập| ";
/**
 *
 * @author nhannv-pc
 *         Base Controller
 */
class ControllerBase extends Controller {
	
	/**
	 * init function setup layout and title
	 */
	protected function initialize() {
		// set web title
		$this->tag->prependTitle ( WEB_TITLE );
		
		// set layout
	}
	protected function forward($uri) {
		$uriParts = explode ( '/', $uri );
		$params = array_slice ( $uriParts, 3 );
		return $this->dispatcher->forward ( array (
				'module' => $uriParts [0],
				'controller' => $uriParts [1],
				'action' => $uriParts [2],
				'param' => $params 
		) );
		;
	}
}