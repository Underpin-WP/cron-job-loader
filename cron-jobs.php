<?php

use Underpin\Abstracts\Underpin;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Add this loader.
Underpin::attach( 'setup', new \Underpin\Factories\Observer( 'cron_jobs', [
	'update' => function ( Underpin $plugin ) {
	require_once( plugin_dir_path( __FILE__ ) . 'Cron_Job.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'Cron_Job_Instance.php' );
	$plugin->loaders()->add( 'cron_jobs', [
		'instance' => 'Underpin_Cron_Jobs\Abstracts\Cron_Job',
		'default'  => 'Underpin_Cron_Jobs\Factories\Cron_Job_Instance',
	] );
	},
] ) );