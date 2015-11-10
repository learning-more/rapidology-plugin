<?php

if ( ! class_exists( 'RAD_Dashboard' ) ) {
require_once( RAD_RAPIDOLOGY_PLUGIN_DIR . 'rapidology.php' );
}

class rapidology_mailchimp extends RAD_Rapidology{

	public function __contruct(){

	}

	public function draw_mailchimp_form($form_fields, $service, $field_values)
	{
		$form_fields .= sprintf( '
					<div class="rad_dashboard_account_row">
						<label for="%1$s">%2$s</label>
						<input type="password" value="%3$s" id="%1$s">%4$s
					</div>',
			esc_attr( 'api_key_' . $service ),
			__( 'API key', 'rapidology' ),
			( '' !== $field_values && isset( $field_values['api_key'] ) ) ? esc_attr( $field_values['api_key'] ) : '',
			RAD_Rapidology::generate_hint( sprintf(
				'<a href="http://www.rapidology.com/docs#'.$service.'" target="_blank">%1$s</a>',
				__( 'Click here for more information', 'rapidology' )
			), false
			)
		);
		return $form_fields;
	}

	/**
	 * Retrieves the lists via MailChimp API and updates the data in DB.
	 * @return string
	 */
	public function get_mailchimp_lists( $api_key, $name ){

		$lists = array();

		$error_message = '';

		if ( ! function_exists( 'curl_init' ) ) {
			return __( 'curl_init is not defined ', 'rapidology' );
		}

		if ( ! class_exists( 'MailChimp_Rapidology' ) ) {
			require_once( RAD_RAPIDOLOGY_PLUGIN_DIR . 'subscription/mailchimp/mailchimp.php' );
		}

		if ( false === strpos( $api_key, '-' ) ) {
			$error_message = __( 'invalid API key', 'rapidology' );
		} else {
			$mailchimp = new MailChimp_Rapidology( $api_key );

			$retval = $mailchimp->call( 'lists/list' );

			if ( ! empty( $retval ) && empty( $retval['errors'] ) ) {
				$error_message = 'success';

				if ( ! empty( $retval['data'] ) ) {
					foreach ( $retval['data'] as $list ) {
						$lists[ $list['id'] ]['name']              = sanitize_text_field( $list['name'] );
						$lists[ $list['id'] ]['subscribers_count'] = sanitize_text_field( $list['stats']['member_count'] );
						$lists[ $list['id'] ]['growth_week']       = sanitize_text_field( $this->calculate_growth_rate( 'mailchimp_' . $list['id'] ) );
					}
				}
				$this->update_account( 'mailchimp', sanitize_text_field( $name ), array(
					'lists'         => $lists,
					'api_key'       => sanitize_text_field( $api_key ),
					'is_authorized' => 'true',
				) );
			} else {
				if ( ! empty( $retval['errors'] ) ) {
					$errors = '';
					foreach ( $retval['errors'] as $error ) {
						$errors .= $error . ' ';
					}
					$error_message = $errors;
				}

				if ( '' !== $error_message ) {
					$error_message = sprintf( '%1$s: %2$s',
						esc_html__( 'Additional Information: ' ),
						$error_message
					);
				}

				$error_message = sprintf( '%1$s. %2$s',
					esc_html__( 'An error occured during API request. Make sure API Key is correct', 'rapidology' ),
					$error_message
				);
			}
		}

		return $error_message;

	}

	/**
	 * Subscribes to Mailchimp list. Returns either "success" string or error message.
	 * @return string
	 */

	public function subscribe_mailchimp( $api_key, $list_id, $email, $name = '', $last_name = '', $disable_dbl ){
		if ( ! function_exists( 'curl_init' ) ) {
			return;
		}

		if ( ! class_exists( 'MailChimp_Rapidology' ) ) {
			require_once( RAD_RAPIDOLOGY_PLUGIN_DIR . 'subscription/mailchimp/mailchimp.php' );
		}

		$mailchimp = new MailChimp_Rapidology( $api_key );

		$email = array( 'email' => $email );
		$double_optin = '' === $disable_dbl ? 'true' : 'false';

		$merge_vars = array(
			'FNAME' => $name,
			'LNAME' => $last_name,
		);

		$retval = $mailchimp->call( 'lists/subscribe', array(
			'id'         => $list_id,
			'email'      => $email,
			'double_optin' => $double_optin,
			'merge_vars' => $merge_vars,
		) );

		if ( isset( $retval['error'] ) ) {
			if ( '214' == $retval['code'] ) {
				$error_message = str_replace( 'Click here to update your profile.', '', $retval['error'] );
			} else {
				$error_message = $retval['error'];
			}
		} else {
			$error_message = 'success';
		}

		return $error_message;
	}

}