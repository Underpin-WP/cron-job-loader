<?php
/**
 * Cron Job Factory
 *
 * @since   1.0.0
 * @package Underpin\Abstracts
 */


namespace Underpin\Cron_Jobs\Factories;


use Underpin\Traits\Instance_Setter;
use Underpin\Cron_Jobs\Abstracts\Cron_Job;


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
	use Instance_Setter;

	protected $action_callback;

	/**
	 * Cron_Job_Instance constructor.
	 *
	 * @param array    $args      Overrides to default args in the Cron_Job object
	 */
	public function __construct( $args = [] ) {
		$this->set_values( $args );

		parent::__construct( $args['name'], $args['frequency'] );
	}

	function cron_action() {
		return $this->set_callable( $this->action_callback );
	}

}