<?php

if (!defined('UPDRAFTPLUS_DIR')) die('No direct access allowed.');

if (!class_exists('UpdraftPlus_Login')) require_once('updraftplus-login.php');

class UpdraftPlus_Clone extends UpdraftPlus_Login {
	
	/**
	 * Pulls the appropriate message for the given code and translate it before
	 * returning it to the caller
	 *
	 * @internal
	 * @param string $code The code of the message to pull
	 * @return string - The translated message
	 */
	protected function translate_message($code) {
		switch ($code) {
			case 'generic':
			default:
				return __('An error has occurred while processing your request. The server might be busy or you have lost your connection to the internet at the time of the request. Please try again later.', 'updraftplus');
				break;
		}
	}

	/**
	 * Executes login or registration process. Connects and sends request to the UpdraftPlus clone
	 * and returns the response coming from the server
	 *
	 * @internal
	 * @param array   $data     The submitted form data
	 * @param boolean $register Indicates whether the current call is for a registration process or not. Defaults to false. Currently will always be false.
	 * @return array - The response from the request
	 */
	protected function login_or_register($data, $register = false) {
		global $updraftplus;

		$action = ($register) ? 'updraftplus_clone_register' : 'updraftplus_clone_login';
		if (empty($data['site_url'])) $data['site_url'] = trailingslashit(network_site_url());

		$response = $this->send_remote_request($data, $action);
		if (is_wp_error($response)) {
			$response = array('error' => true, 'code' => $response->get_error_code(), 'message' => $response->get_error_message());
		} else {
			if (isset($response['status'])) {
				if ('error' === $response['status']) {
					$response = array(
						'error' => true,
						'code' => isset($response['code']) ? $response['code'] : -1,
						'message' => isset($response['message']) ? $response['message'] : $this->translate_message('generic'),
						'response' => $response
					);
				}
			} else {
				$response = array('error' => true, 'message' => $this->translate_message('generic'));
			}
		}

		return $response;
	}
}
