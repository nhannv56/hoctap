<?php

/**
 * Register application modules
 */
$application->registerModules ( array (
		'frontend' => array (
				'className' => 'hoctap\Frontend\Module',
				'path' => __DIR__ . '/../apps/frontend/Module.php' 
		),
		'anonymous' => array (
				'className' => 'hoctap\Anonymous\Module',
				'path' => __DIR__ . '/../apps/anonymous/Module.php' 
		) 
) );
