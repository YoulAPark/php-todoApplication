<?php
	include("../study/header.php");
	require_once './Request.php';
	require_once './DB.php';
	require_once './Todo.php';
	
	/**
	 * 할 일을 작성하는 페이지 입니다.
	 * 할 일을 작성하는 곳에 할 일을 작성하고 저장을 누르면 저장을 할 수 있습니다.
	 * 돌아가기를 누를 경우 메인페이지로 이동됩니다.
	 *
	 * @param string $tTitle 새로 작성한 할 일의 제목
	 */
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$tTitle = Request::post('tTitle'); // 없을 경우 NULL, 빈 값(내용이 없을경우) 예외 처리, 길이제한
		$todo = new Todo();
		$todo->insertTodo($tTitle);
		header('Location: index.php'); // header에서 location인 경우에만
		exit();
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