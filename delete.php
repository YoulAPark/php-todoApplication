<?php
	/**
	 * 원하는 데이터를 삭제할 때 사용되는 페이지입니다.
	 *
	 * @param int $tNo 클릭한 영역의 고유 번호
	 */

	require_once './DB.php';
	require_once './Request.php';
	require_once './Todo.php';
	require_once './common/common.php';
	
	if ($_SERVER['REQUEST_METHOD'] === 'GET') {
		
		$tNo = Request::get('tNo');
		$todo = new Todo();
		$tNoDB = $todo->getTodoOne($tNo);

		if (is_null($tNo)) { // 빈 값 일경우
			$content = '값이 들어있지 않습니다.';
			alertFunc($content);
			
		} elseif (!is_numeric($tNo)) { // 데이터타입이 숫자가 아닐경우
			$content = '숫자만 가능합니다.';
			alertFunc($content);
			
		} elseif (empty($tNoDB)) { // DB에 들어있는 값이 없을 경우
			$content = 'URL값이 잘못되었습니다.';
			alertFunc($content);
			
		} else {
			$todo->deleteTodo($tNo);
		}
	}
?>