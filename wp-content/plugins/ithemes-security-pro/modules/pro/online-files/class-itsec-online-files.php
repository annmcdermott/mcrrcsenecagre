<?php

class ITSEC_Online_Files {

	function run() {

		add_action( 'itsec_process_added_files', array( $this, 'itsec_process_added_files' ) );
		add_action( 'itsec_process_changed_file', array( $this, 'itsec_process_changed_file' ), 10, 3 );

	}

	/**
	 * Removes any subdirectory or other additional file information
	 *
	 * @since 1.10
	 *
	 * @param string $file the file to clean
	 *
	 * @return string the corected file name
	 */
	private function get_computed_filename( $file ) {

		$path_info = parse_url( site_url() );

		if ( isset ( $path_info['path'] ) ) {

			return str_replace( trailingslashit( $path_info['path'] ), '', '/' . $file );

		} else {

			return $file;
		}

	}

	/**
	 * Retrieves core hashes from the WordPress.org API
	 *
	 * @since 1.10
	 *
	 * @param string $type what type of data to retrieve, core, plugins or themes
	 * @param string $slug the slug to get
	 *
	 * @return array|mixed Array of core hash files or false if not available.
	 */
	private function get_remote_files( $type = 'core', $slug = null ) {

		global $wp_version;

		if ( $type !== 'core' && $type !== 'plugin' && $type !== 'theme' ) {
			return false;
		}

		//type and slug currently are not implemented but are for future checking of themes and plugins
		$type = sanitize_text_field( $type );

		if ( $slug !== null ) {

			$slug = sanitize_text_field( $slug );

		} else {

			$slug = '';

		}

		$remote_files = get_site_transient( 'itsec_online_files_remote_checksums' );

		if ( $remote_files === false ) {

			$raw_files = wp_remote_get( 'https://api.wordpress.org/core/checksums/1.0/?version=' . sanitize_text_field( $wp_version ) . '&locale=' . sanitize_text_field( get_locale() ) );

			if ( is_array( $raw_files ) && isset( $raw_files['body'] ) ) {

				$decoded_raw_files = json_decode( $raw_files['body'], true );

				if ( isset( $decoded_raw_files['checksums'] ) && $decoded_raw_files['checksums'] !== false ) {

					set_site_transient( 'itsec_online_files_remote_checksums', $decoded_raw_files['checksums'], 604800 ); //only update once a week
					return $decoded_raw_files['checksums']; //return what we got after saving it

				} else {

					set_site_transient( 'itsec_online_files_remote_checksums', null, 3600 );

					return false; //couldn't get the remote files so just return false

				}

			}

		}

		return $remote_files;

	}

	/**
	 * Compare files added with remote repository.
	 *
	 * @since 1.10
	 *
	 * @param array $files_added Array of files added since last local check
	 *
	 * @return mixed false or array of files confirmed changed
	 */
	public function itsec_process_added_files( $files_added ) {

		$core = $this->get_remote_files();

		if ( $core === false ) {
			return $files_added;
		}

		foreach ( $files_added as $file => $attr ) {

			if ( isset( $core[ $file ] ) && isset( $file['h'] ) && $file['h'] === $core[ $file ] ) {
				unset( $files_added[ $file ] );
			}

		}

		return ( $files_added );

	}

	/**
	 * Compare a file that has been marked as changed since the last local scan.
	 *
	 * @since 1.10
	 *
	 * @param bool   $changed whether the file has been changed or not
	 * @param string $file    The name of the file to check
	 * @param string $hash    the md5 to check
	 *
	 * @return bool whether a remote difference is detected or false
	 */
	public function itsec_process_changed_file( $changed, $file, $hash ) {

		$core = $this->get_remote_files();

		if ( $core === false ) {
			return $changed;
		}

		$check_file = $this->get_computed_filename( $file );

		if ( isset( $core[ $check_file ] ) && $hash === $core[ $check_file ] ) {
			$changed = false;
		}

		return $changed;

	}

}