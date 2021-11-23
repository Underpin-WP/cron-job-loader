<?php

use Underpin\Abstracts\Underpin;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Add this loader.
Underpin::attach( 'setup', new \Underpin\Factories\Observers\Loader( 'cron_jobs', [
	'instance' => 'Underpin\Cron_Jobs\Abstracts\Cron_Job',
	'default'  => 'Underpin\Cron_Jobs\Factories\Cron_Job_Instance',
] ) );