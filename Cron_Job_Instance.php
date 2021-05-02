<?php
/**
 * Cron Job Factory
 *
 * @since   1.0.0
 * @package Underpin\Abstracts
 */


namespace Underpin_Cron_Jobs\Factories;


use Underpin_Cron_Jobs\Abstracts\Cron_Job;
use function Underpin\underpin;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Admin_Bar_Menu
 * Handles creating custom admin bar menus
 *
 * @since   1.0.0
 * @package Underpin\Abstracts
 */
class Cron_Job_Instance extends Cron_Job {

	/**
	 * Cron_Job_Instance constructor.
	 *
	 * @param callable $action The event callback
	 * @param string   $event The event name
	 * @param string   $frequency The event frequency
	 * @param array    $args Overrides to default args in the Cron_Job object
	 */
	public function __construct( $action, $event, $frequency = 'hourly', $args = [] ) {
		if ( is_callable( $action ) ) {
			$this->action = $action;
		} else {
			$this->action = underpin()->logger()->log_as_error(
				'error',
				'invalid_cron_action',
				'The provided cron job action is invalid',
				[
					'action' => $action,
					'args'   => $args,
				]
			);
		}

		// Override default params.
		foreach ( $args as $arg => $value ) {
			if ( isset( $this->$arg ) ) {
				$this->$arg = $value;
				unset( $args[ $arg ] );
			}
		}

		parent::__construct( $event, $frequency );
	}

	function cron_action() {
		if ( is_wp_error( $this->action ) ) {
			return false;
		}

		return call_user_func( $this->action );
	}

}