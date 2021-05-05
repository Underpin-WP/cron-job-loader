<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Add this loader.
add_action( 'underpin/before_setup', function ( $file ) {
	require_once( plugin_dir_path( __FILE__ ) . 'Cron_Job.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'Cron_Job_Instance.php' );
	Underpin\underpin()->get( $file )->loaders()->add( 'cron_jobs', [
		'instance' => 'Underpin_Cron_Jobs\Abstracts\Cron_Job',
		'default'  => 'Underpin_Cron_Jobs\Factories\Cron_Job_Instance',
	] );
} );