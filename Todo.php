<?php
class Todo {
	private static DB $_connect;

	public function __construct() {
		self::$_connect = new DB();
	}

	/**
	 * 할 일을 저장하는 함수입니다.
	 *
	 * @param string $tTitle 할 일
	 * @return void
	 */
	public function insertTodo(string $tTitle):void {
		$query = "INSERT INTO THINGS (tTitle) VALUES ('$tTitle')"; // Injection 알아만보기
		self::$_connect->insert($query);
	}

	/**
	 * 할 일을 삭제하는 함수입니다.
	 *
	 * @param int $tNo 고유번호
	 * @return void
	 */
	public function deleteTodo(int $tNo):void {
		$query = "DELETE FROM THINGS WHERE tNo = $tNo";
		self::$_connect->delete($query);
	}
	
	/**
	 * 할 일을 수정하는 함수입니다.
	 *
	 * @param int $tNo 고유번호
	 * @param string $tTitle 할 일
	 * @return void
	 */
	public static function updateTodo(int $tNo, string $tTitle):void {
		$query = "UPDATE THINGS SET tTitle = '$tTitle' WHERE tNo = $tNo";
		self::$_connect->update($query);
	}	
		
	/**
	 * 할 일 전체를 가져오는 함수입니다.
	 *
	 * @return array
	 */
	public function getTodo():array {
		$query = "SELECT * FROM THINGS";
		return self::$_connect->select($query);		
	}
	
	/**
	 * 하나의 할 일를 가져오는 함수입니다.
	 *
	 * @param int $tNo 고유번호
	 * @return array
	 */
	public function getTodoOne(int $tNo):array { //array 반환 아닌 하나 or NULL 반환
		$query = "SELECT * FROM THINGS WHERE tNo = $tNo";
		return self::$_connect->select($query);	
	}
	// INSERT, delete, update 쿼리로 바꾸고
	
}