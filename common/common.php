<?php
	/**
	 * 값이 비었거나 NULL일 경우, 
	 * 숫자가 아닌 다른 데이터타입이 들어왔을 경우 창을 띄우는 기능을 합니다.
	 * 창을 띄운 이후 창 띄우기 이전 페이지로 돌아갑니다.
	 *
	 * @param string $content 띄우고 싶은 메세지
	 */
	function alertFunc($content) {
		echo '<script>alert("' . $content . '");</script>';
		echo '<script>history.go(-1)</script>';
		exit();
	}
	
	/**
	 * 현재페이지를 indexPage로 리다이렉트 합니다.
	 */
	function locationIndex() {
		echo '<script>location.href="index.php"</script>';
		exit();
	}
?>