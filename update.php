<?php
	/**
	 * 수정을 해야할 일에 대한 정보를 표시하고, 수정한 내용을 받아 UPDATE(수정)의 기능을 하는 페이지입니다.
	 * 돌아가기를 누를 경우 메인페이지로 이동됩니다.
	 *
	 * @param int $tNo 수정할 할 일의 고유 번호
	 * @param string $tTitle 수정할 할 일의 내용
	 */

	require_once './Request.php';
	require_once './DB.php';
	require_once './Todo.php';
	include '../study/header.php';
	
	$todo = new Todo();
	$tNo = Request::get('tNo'); //
	// tNo가 Null이거나 빈 값일 경우 예외처리!!!
	$list = $todo->getTodoOne($tNo); // list Null일 경우 예외처리
	
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$tNo = Request::post('titleNo'); // tNo를 가진 값이 있는지 없으면 예외처리!
		$tTitle = Request::post('titleName'); // tNo를 가진 값이 있는지 없으면 예외처리!
		$todo->updateTodo($tNo, $tTitle);
		// Todo::updateTodo($tNo, $tTitle); // static선언 쓸 데 없는 행동
		header('Location: index.php');
	}
?>

<form method="post" action="update.php?tNo=<?php echo $tNo; ?>"> <!-- NULL!! 16번라인 -->
	<div class="mb-3">
		<label class="form-label">			
			<h2>수정하기</h2>
		</label>
		<hr>
			<table class="table caption-top">
				<thead>
					<tr>
						<th>To do</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<input type="hidden" name="titleNo" value="<?php echo $tNo; ?>"> <!-- name="tNo" 같은 변수 -->
						<td><?php echo $list[0]['tTitle']; ?></td>
					</tr>
				</tbody>
			</table>
		<hr>
		<input type="text" name="titleName" class="form-control" placeholder="수정할 할 일을 적어주세요">
	</div>
	<button type="submit" class="btn">수정</button>
	<a href="index.php" class="btn">돌아가기</a>
</form>