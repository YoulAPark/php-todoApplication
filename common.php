<?php
	/**
	 * 값이 비었거나 NULL일 경우, 
	 * 숫자가 아닌 다른 데이터타입이 들어왔을 경우 창을 띄우는 기능을 합니다.
	 *
	 * @param string $content 띄우고 싶은 메세지
	 */
	function alertFunc($content) {
		echo '<script>alert("' . $content . '");</script>';
		exit();
	}
?>