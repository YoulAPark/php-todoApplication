<?php
	/**
	 * 작성한 할 일들의 번호, 내용을 보여주는 페이지 입니다.
	 * 작성하기를 누를경우 할 일을 작성하는 페이지로 이동할 수 있으며,
	 * 수정하기를 누를경우 할 일을 수정할 수 있습니다.
	 * 또한, 삭제하기 버튼을 누르게 되면 작성한 할 일을 삭제할 수 있습니다.
	 */
	 
	require_once './Request.php';
	require_once './DB.php';
	require_once './Todo.php';
	include '../study/header.php';
	
	$todo = new Todo();
	$list = $todo->getTodo();	
?>
<h2>To do</h2>
<hr>
<p><a href="insert.php" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">작성하기</a></p>
<hr>
<table class="table table-hover">
  <thead>
	<tr>
	  <th style="width: 10%">번호</th>
	  <th style="width: 40%">제목</th>
	  <th style="width: 10%">수정</th>
	  <th style="width: 10%">삭제</th>
	</tr>
  </thead>
  <tbody>
	<?php foreach ($list as $lists) { ?>
	<tr>
	  <th scope="row"><?php echo $lists['tNo'] ?></th>
	  <td><?php echo $lists['tTitle'] ?></td>
	  <td><a href="update.php?tNo=<?php echo $lists['tNo'] ?>">수정하기</a></td>
	  <td><a href="delete.php?tNo=<?php echo $lists['tNo'] ?>">삭제하기</a></td>
	</tr>
	<?php } ?>
  </tbody>
</table>