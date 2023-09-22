<?php
	include("../study/header.php");
	require_once './DB.php';
	require_once './Todo.php';
	
	/**
	 * 원하는 데이터를 삭제할 때 사용되는 페이지입니다.
	 *
	 * @param int $tNo 클릭한 영역의 고유 번호
	 */
	if ($_SERVER['REQUEST_METHOD'] === 'GET') {
		$tNo = $_GET['tNo'];
		$todo = new Todo();
		$todo->deleteTodo($tNo);
		header('Location: index.php');
	}
?>