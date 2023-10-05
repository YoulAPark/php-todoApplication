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
	require_once './common/common.php';
	include './common/update/header.php';
	
	$todo = new Todo();
	$tNo = Request::get('tNo');
	
	if (empty($tNo)) {
		$content = '값이 비어있습니다.';
		alertFunc($content);
		
	} elseif (!isset($tNo)) {
		$content = '변수가 잘못되었습니다.';
		alertFunc($content); 
		
	} elseif (!is_numeric($tNo)) {
		$content = '숫자가 아닙니다.';
		alertFunc($content); 
	}
	
	$DB = $todo->getTodoOne($tNo);
	
	if ( !empty($DB) ) {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {		
			$tNo = Request::post('tNo');
			$tTitle = Request::post('tTitle');
			$todo->updateTodo($tNo, $tTitle);
			locationIndex();
		}
	} elseif ( empty($DB) ) {
		$content = '데이터베이스에 값이 존재하지 않습니다.';
		alertFunc($content);
	}
	
?>

<form name="updateForm" method="post" action="update.php?tNo=<?php echo $tNo; ?>">
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
						<input type="hidden" name="tNo" value="<?php echo $tNo; ?>">
						<td><?php echo $DB[0]['tTitle']; ?></td>
					</tr>
				</tbody>
			</table>
		<hr>
		<input type="text" name="tTitle" class="form-control" placeholder="수정할 할 일을 적어주세요">
	</div>
	<button type="submit" onclick="return validateForm();" class="btn">수정</button>
	<a href="index.php" class="btn">돌아가기</a>
</form>