<?php
	//provide your hostname, username and dbname
	$host="localhost"; 
	$username="root";  
	$password="";
	$db_name="books"; 

	$con=mysqli_connect("$host", "$username", "$password", "$db_name")or die("cannot connect");

	$book_name = $_POST['book_name'];
	if(strlen($book_name) > 0){
		$sql = "select book_name from book_mast where book_name LIKE '$book_name%'";
		$result = mysqli_query($con, $sql);
		while($row=mysqli_fetch_array($result)){
			echo "<p>".$row['book_name']."</p>";
		}
	} else {
		echo "<p></p>";
	}
?>
