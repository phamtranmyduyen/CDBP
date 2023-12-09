<?php

class DataProvider
{

	public function connect()
	{
		include('ketnoi.php');
		$conn = mysqli_connect($host, $user, $pass, $db);
		return $conn;
	}
	public static function executeQuery($sql)
	{
		include('ketnoi.php');
		if (!($connection= mysqli_connect($host, $user, $pass)))
			die("couldn't connect to localhost");
			
		if (!(mysqli_select_db($connection, $db)))
			echo "Khong the ket noi 1";

		if (!(mysqli_query($connection, "set names 'utf8'")))
			echo "Khong the set utf8";
			
		if (!($result = mysqli_query($connection, $sql)))
		die("error: ".mysqli_error($connection));
			
		// Dong ket noi CSDL
		if (!(mysqli_close($connection)))
			echo "Khong the ket noi 4";
		return $result;
	}

}
