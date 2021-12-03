<?php 

$mysqli = new mysqli("localhost","dbname","dbpass","tablename");

//if insert key is pressed then do insertion
if($_POST['action'] == 'insert'){
	
	$name  = mysqli_real_escape_string($mysqli, $_POST['name']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	
	if ( $name != '' && $email != '' ) {

		$sql   = "insert into demo_mytable (name, email) values ('$name', '$email')";
		$query = $mysqli -> query($sql);
		if($query){
			echo "Record Inserted.";
		}else {
			echo "Something Wrong!";
		}
	} else {
		echo "Please enter name & email";
	}
}
//if insert key is pressed show records
if($_POST['action'] == 'show'){
	$sql   = "select * from demo_mytable order by id desc limit 10";
	$query = $mysqli -> query($sql);
	
	echo "<table border='1'>";
	while($row = $query -> fetch_assoc()){
		echo "<tr><td>$row[id]</td><td>$row[name]</td><td>$row[email]</td></tr>";
	}
	echo "</table>";
}

?>