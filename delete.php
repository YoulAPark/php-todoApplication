<?php
	/**
	 * 원하는 데이터를 삭제할 때 사용되는 페이지입니다.
	 *
	 * @param int $tNo 클릭한 영역의 고유 번호
	 */

	require_once './DB.php';
	require_once './Todo.php';
	
	if ($_SERVER['REQUEST_METHOD'] === 'GET') {
		$tNo = $_GET['tNo']; // $_GET 수정 / NULL일 경우 예외처리 / 빈 값일 경우
		
		$todo = new Todo();
		$todo->deleteTodo($tNo);
		header('Location: index.php');
	}
?>

// 예외처리