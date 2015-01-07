<?php

if ( ! class_exists( 'ITSEC_Online_Files_Setup' ) ) {

	class ITSEC_Online_Files_Setup {

		private
			$defaults;

		public function __construct() {

			global $itsec_setup_action;

			$this->defaults = array(
			);

			if ( isset( $itsec_setup_action ) ) {

				switch ( $itsec_setup_action ) {

					case 'activate':
						$this->execute_activate();
						break;
					case 'upgrade':
						$this->execute_upgrade();
						break;
					case 'deactivate':
						$this->execute_deactivate();
						break;
					case 'uninstall':
						$this->execute_uninstall();
						break;

				}

			} else {
				wp_die( 'error' );
			}

		}

		/**
		 * Execute module activation.
		 *
		 * @since 4.0
		 *
		 * @return void
		 */
		public function execute_activate() {

		}

		/**
		 * Execute module deactivation
		 *
		 * @return void
		 */
		public function execute_deactivate() {

			delete_site_transient( 'itsec_online_files_remote_checksums' );

		}

		/**
		 * Execute module uninstall
		 *
		 * @return void
		 */
		public function execute_uninstall() {

		}

		/**
		 * Execute module upgrade
		 *
		 * @return void
		 */
		public function execute_upgrade() {

		}

	}

}

new ITSEC_Online_Files_Setup();