<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
?>
<!doctype html>
<html>
  <head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<!-- CSS 첨부하는 곳 -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	
	<script>
		/**
		 * 값을 입력 후 저장/수정 할 때 아무것도 입력하지 않았을 경우 메세지를 띄우는 기능을 합니다.
		 *
		 * @param input type="text" 
		 */
		function alertMsg() {
			alert("빈 칸을 입력하세요.");
		}
		
		/**
		 * update.php에서 값을 입력하지 않았을 경우 alertMsg() 기능을 수행하는 역할을 합니다.
		 *
		 * @param string $tTitle 타이틀
		 * return alertMsg()
		 */
		function validateForm() {
			var tTitle = document.forms["updateForm"]["tTitle"].value;
			if (tTitle === "") { 
				alertMsg(); // tTitle이 비어있을 경우 alertMsg()를 실행합니다.
				return false
			}
		}
	</script>
  </head>
  
  <body>
		<div class="container mt-4 my-5 lead text-center">