<?php

namespace hoctap\Teacher;

use Phalcon\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Config\Adapter\Ini;

class Module implements ModuleDefinitionInterface {
	/**
	 * Registers an autoloader related to the module
	 *
	 * @param DiInterface $di        	
	 */
	public function registerAutoloaders(DiInterface $di = null) {
		$loader = new Loader ();
		
		$loader->registerNamespaces ( array (
				'hoctap\Teacher\Controllers' => __DIR__ . '/controllers/',
				'hoctap\Teacher\Models' => __DIR__ . '/models/',
				'hoctap\Form\MathForm' => APP_PATH . '/forms' 
		) );
		
		$loader->register ();
	}
	
	/**
	 * Registers services related to the module
	 *
	 * @param DiInterface $di        	
	 */
	public function registerServices(DiInterface $di) {
		/**
		 * Read configuration
		 */
		$config = new Ini ( APP_PATH . "/apps/teacher/config/config.ini" );
		
		/**
		 * Setting up the view component
		 */
		$di ['view'] = function () {
			$view = new View ();
			$view->setViewsDir ( __DIR__ . '/views/' );
			
			// set layout
			$view->setLayoutsDir ( '../../../layouts/' );
			$view->setTemplateAfter ( 'main' );
			return $view;
		};
		
		/**
		 * Database connection is created based in the parameters defined in the configuration file
		 */
		$di ['db'] = function () use($config) {
			return new DbAdapter ( array (
					'host' => $config->database->host,
					'username' => $config->database->username,
					'password' => $config->database->password,
					'dbname' => $config->database->dbname 
			) );
		};
	}
}
