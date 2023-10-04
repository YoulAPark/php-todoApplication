<?php
	/**
	 * 원하는 데이터를 삭제할 때 사용되는 페이지입니다.
	 *
	 * @param int $tNo 클릭한 영역의 고유 번호
	 */

	require_once './DB.php';
	require_once './Request.php';
	require_once './Todo.php';
	
	if ($_SERVER['REQUEST_METHOD'] === 'GET') {
		$tNo = Request::get('tNo'); // NULL일 경우 예외처리 / 빈 값일 경우
		$todo = new Todo();
		$tNoDB = $todo->getTodoOne($tNo);

		if ( is_null($tNo) ) { // 빈 값 일경우
			echo '<script>alert("값이 들어있지 않습니다.");</script>';
			exit();
		} elseif ( !is_int($tNo) ) {
			echo '<script>alert("숫자만 가능합니다.");</script>';
			exit();
		} elseif ( empty($tNoDB) ) { // DB에 들어있는 값이 없을 경우
			echo '<script>alert("URL값이 잘못되었습니다.");</script>';
			exit();
		} else {
			$todo->deleteTodo($tNo);
			header('Location: index.php');
		}
	}
?>