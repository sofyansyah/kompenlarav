<?php


if(isset($_POST["Import"])){
	
	$filename=$_FILES["file"]["tmp_name"];		
	
	
	if($_FILES["file"]["size"] > 0)
	{
		$file = fopen($filename, "r");
		while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
		{
			
			
			$sql = "INSERT into karyawan (id,nama,nid,jabatan,grade) 
			values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."')";
			$result = mysqli_query($con, $sql);
			if(!isset($result))
			{
				echo "<script type=\"text/javascript\">
				alert(\"Invalid File:Please Upload CSV File.\");
				window.location = \"index.php\"
			</script>";		
		}
		else {
			echo "<script type=\"text/javascript\">
			alert(\"CSV File has been successfully Imported.\");
			window.location = \"index.php\"
		</script>";
	}
}

fclose($file);	
}
}	 


?>

<?php

function get_all_records(){
	$con = getdb();
	$Sql = "SELECT * FROM karyawan";
	$result = mysqli_query($con, $Sql);  
	
	
	if (mysqli_num_rows($result) > 0) {
		echo "<div class='table-responsive'><table id='myTable' class='table table-striped table-bordered'>
		<thead><tr><th>Id</th>
			<th>Nama</th>
			<th>Nid</th>
			<th>Jabatan</th>
			<th>Grade</th>
		</tr></thead><tbody>";
		
		
		while($row = mysqli_fetch_assoc($result)) {
			
			echo "<tr><td>" . $row['id']."</td>
			<td>" . $row['nama']."</td>
			<td>" . $row['nid']."</td>
			<td>" . $row['jabatan']."</td>
			<td>" . $row['grade']."</td></tr>";        
		}
		
		echo "</tbody></table></div>";
		
	} else {
		echo "you have no records";
	}
}

?>