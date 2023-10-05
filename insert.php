<?php
	/**
	 * 할 일을 작성하는 페이지 입니다.
	 * 할 일을 작성하는 곳에 할 일을 작성하고 저장을 누르면 저장을 할 수 있습니다.
	 * 돌아가기를 누를 경우 메인페이지로 이동됩니다.
	 *
	 * @param string $tTitle 새로 작성한 할 일의 제목
	 */
	
	require_once './Request.php';
	require_once './DB.php';
	require_once './Todo.php';
	require_once './common/common.php';
	include './common/header.php';
	
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		
		$tTitle = Request::post('tTitle');
				
		if (empty($tTitle)) { // $tTitle 값이 비어있을 때
			$content = '할 일을 입력해주세요';
			alertFunc($content);
			
		} elseif (strlen($tTitle) > 50) { // $tTitle 값이 50자를 초과했을 경우
			$content = '50자 내외로 입력부탁드리겠습니다. 입력개수 : ' . strlen($tTitle);
			alertFunc($content);
			
		} else { 
			$todo = new Todo();
			$todo->insertTodo($tTitle);
			locationIndex();
		}
	}
?>

<form method="post" action="insert.php">
	<div class="mb-3">
		<label class="form-label"><h2>작성하기</h2></label>
		<hr>
		<input type="text" name="tTitle" class="form-control" placeholder="할 일을 작성하는 곳">
	</div>
	<button type="submit" class="btn">저장</button>
	<a href="index.php" class="btn">돌아가기</a>
</form>