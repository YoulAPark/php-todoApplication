<?php
class Request {
	/**
	 * GET 으로 받는 데이터를 가져올 수 있습니다.
	 *
	 * @param string $key GET 변수명
	 * @return ?string $value 변수값
	 */
	public static function get(string $key):?string {
		return isset($_GET[$key]) == true ? $_GET[$key] : null;
	}

	/**
	 * POST 으로 받는 데이터를 가져올 수 있습니다.
	 *
	 * @param string $key POST 변수명
	 * @return ?string $value 변수값
	 */
	public static function post(string $key):?string {
		return isset($_POST[$key]) == true ? $_POST[$key] : null;
	}
}
