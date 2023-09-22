<?php
class DB {
	
	private static $_connect;
	
	/**
	 * DB연결을 한번만 초기화 하도록 설정해주는 역할을 합니다.
	 * DB 클래스의 인스턴스를 생성할 때마다 새 연결을 하는게 아닌,
	 * 이미 연결된 경우는 이전 연결을 재사용하는 방식으로 동작하여 중복을 피할 수 있습니다.
	 *
	 * @param $_connect
	 */
	public function __construct() {
		if (isset(self::$_connect) == false) {
			require_once './env.php';
			$host = $_ENV['todoDB']['host'];
			$username = $_ENV['todoDB']['username'];
			$password = $_ENV['todoDB']['password'];
			$database = $_ENV['todoDB']['database'];
			self::$_connect = mysqli_connect($host, $username, $password, $database);
		}
	}
	
	/**
	 * 쿼리를 실행하는 역할을 합니다,
	 *
	 * @param string $query 쿼리문
	 * @return mysqli_result|bool $success
	 */
	public function query(string $query):mysqli_result|bool {
		return mysqli_query(self::$_connect, $query);
	}	
		
	/**
	 * DB에 있는 데이터를 조회하는 역할을 합니다.
	 *
	 * @param string $query 쿼리문
	 * @return array
	 */
	public function select(string $query):array {
		$result = $this->query($query);
		$results = [];
		if ($result !== false) {
			while ($row = mysqli_fetch_assoc($result)) {
				$results[] = $row;
			}
		}
		return $results;
	}
	
	/**
	 * 데이터를 DB에 저장하는 역할을 합니다.
	 *
	 * @param string $query 쿼리문
	 * @return bool
	 */
	public function insert(string $query):bool {
		return $this->query($query); 
	}
	
	/**
	 * DB에 있는 데이터를 수정하는 역할을 합니다.
	 *
	 * @param string $query 쿼리문
	 * @return bool
	 */
	public function update(string $query):bool {
		return $this->query($query); 
	}
	
	/**
	 * DB에 있는 데이터를 삭제하는 역할을 합니다.
	 *
	 * @param string $query 쿼리문
	 * @return bool
	 */
	public function delete(string $query):bool {
		return $this->query($query); 
	}		
}