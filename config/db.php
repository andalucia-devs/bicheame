<?php

	use Illuminate\Database\Capsule\Manager as Capsule;

	$capsule = new Capsule;

	$capsule->addConnection([
	    'driver'    => 'mysql',
	    'host'      => 'localhost',
	    'database'  => 'bicheame',
	    'username'  => 'bicheame_user',
	    'password'  => 'bicheame_pwd',
	    'charset'   => 'utf8',
	    'collation' => 'utf8_general_ci',
	    'prefix'    => '',
	]);

	// Make this Capsule instance available globally via static methods... (optional)
	$capsule->setAsGlobal();
	// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
	$capsule->bootEloquent();