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
		),
		'teacher' => array (
				'className' => 'hoctap\Teacher\Module',
				'path' => __DIR__ . '/../apps/teacher/Module.php' 
		),
		'student' => array (
				'className' => 'hoctap\Student\Module',
				'path' => __DIR__ . '/../apps/student/Module.php' 
		) 
) );
