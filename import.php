<?php
include 'db.php';
if(isset($_POST["Import"])){
 
 
		echo $filename=$_FILES["file"]["tmp_name"];
 
 
		 if($_FILES["file"]["size"] > 0)
		 {
 
		  	$file = fopen($filename, "r");
	         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
 
	          //It wiil insert a row to our subject table from our csv file`
	           $sql = "INSERT into jadwalprod (`no_wo`, `tgl_proses`, `kode_item`, `nama_item`,`kode_batch`, `bin`, `jam_pasang`, `suhu`, `rh`, `mesin`, `tipe`, `jam_naik`) 
	            	values('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]','$emapData[7]','$emapData[8]','$emapData[9]','$emapData[10]','$emapData[11]')";
	         //we are using mysql_query function. it returns a resource on true else False on error
	          $result = mysqli_query( $conn, $sql);
				if(! $result )
				{
					echo "<script type=\"text/javascript\">
							alert(\"Data sudah ada atau file buka CSV.\");
						window.location = \"index.php\"
					</script>";
 
				}
 
	         }
	         fclose($file);
	         //throws a message if data successfully imported to mysql database from excel file
	         echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location = \"index.php\"
					</script>";
 
 
 
			 //close of connection
			mysqli_close($conn); 
 
 
 
		 }
	}	 
?>