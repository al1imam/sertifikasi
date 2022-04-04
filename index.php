<!DOCTYPE html>
<?php 
	include 'db.php';
?>	

<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Import Excel To MySQL Database Using PHP </title>
		<link rel="stylesheet" href="style.css">

	</head>
	
    <body>    
 
 
	
		<form action="import.php" method="POST" name="upload_excel" enctype="multipart/form-data">
			<fieldset>
		
        <label>Cari No. WO :</label>
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Masukan No. Wo" title="Type in a name">
				<br>
        <br>
        <label>Upload File :</label>
        <input type="file" name="file" id="file" class="input-large">
		<button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Upload</button>
        </fieldset>
		</form>
        <br>
        <a href="clear.php"><button>Delete All</button></a>
		<a href="download.php"><button >Download Excel</button></a>
		<a href="formtambah.php"><button >Tambah Manual</button></a>
        <br>
        <br>
		<table id="jadwal" border="1">
			<thead>
				<tr>
				    <th>No. WO</th>
				  	<th>Tgl Proses</th>
				  	<th>Kode Item</th>
				  	<th>Nama Item</th>
				  	<th>Kode Batch</th>
            <th>Bin</th>
            <th>Jam Pasang</th>
            <th>Suhu</th>
            <th>RH</th>
            <th>Mesin</th>
            <th>Tipe</th>  
            <th>Jam Naik</th>
            <th>Naik</th>
            <th>Pasang</th>
            <th>Hapus</th>
                </tr>	
			</thead>

			<?php
				
				$result_set =  mysqli_query($conn,"select * from jadwalprod");
				while($row = mysqli_fetch_array($result_set))
				{
				?>
                    <tbody>
				    <tr>
						<td><?php echo $row['no_wo']; ?></td>
						<td><?php echo $row['tgl_proses']; ?></td>
						<td><?php echo $row['kode_item']; ?></td>
						<td><?php echo $row['nama_item']; ?></td>
						<td><?php echo $row['kode_batch']; ?></td>
            <td><?php echo $row['bin']; ?></td>
						<td><?php echo $row['jam_pasang']; ?></td>
						<td><?php echo $row['suhu']; ?></td>
						<td><?php echo $row['rh']; ?></td>
						<td><?php echo $row['mesin']; ?></td>
            <td><?php echo $row['tipe']; ?></td>
            <td><?php echo $row['jam_naik']; ?></td>
						<td><a href="naik.php?no_wo=<?php echo $row['no_wo']; ?>"><button >Naik</button></a></td>
                		<td><a href="pasang.php?no_wo=<?php echo $row['no_wo']; ?>"><button >Pasang</button></a></td>
						<td>
						<a href="del.php?no_wo=<?= $row['no_wo']; ?>"  onclick="return confirm('anda yakin ingin hapus?');"><button>Hapus</button></a>
						</td>
						
					</tr>
                    </tbody>
				<?php
				}
			?>

            
		</table>
	</div>
 
	</div>
 
</body>
    <footer>
        
    </footer>
</html>

<script>
  function myFunction() {
    var input, filter, table, tr, td, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("jadwal");
    tr = table.getElementsByTagName("tbody");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
</script>