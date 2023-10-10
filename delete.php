<?php
	/**
	 * 원하는 데이터를 삭제할 때 사용되는 페이지입니다.
	 *
	 * @param int $tNo 클릭한 영역의 고유 번호
	 */
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	require_once './DB.php';
	require_once './Request.php';
	require_once './Todo.php';
	require_once './common/common.php';
	
	if ($_SERVER['REQUEST_METHOD'] === 'GET') {
		
		$tNo = Request::get('tNo');
		$todo = new Todo();
		$DB = $todo->getTodoOne($tNo);
		
		if ($tNo === '0') {
			$content = '값이 0일 수 없습니다';
			alertFunc($content);
		} elseif (is_null($tNo)) {
			$content = 'tNo가 없습니다.';
			alertFunc($content);
		} elseif (!is_numeric($tNo)) {
			$content = '숫자가 아니네요';
			alertFunc($content);
		} elseif (empty($DB)) {
			$content = 'DB에 해당되는 no가 없습니다';
			alertFunc($content);
		} else {
			$todo->deleteTodo($tNo);
			locationIndex();
		}
	}
?>