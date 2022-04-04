<!DOCTYPE html>
<head>
		<meta charset="utf-8">
		<title>Import Excel To MySQL Database Using PHP </title>

	</head>

    <body>
        

<?php 
	include 'db.php';
    $no_wo = $_GET['no_wo'];
    $data = mysqli_query($conn, "select * from jadwalprod where no_wo='$no_wo'");
    while($d = mysqli_fetch_array($data)){

?>	

    <form method="POST" action="update.php">
		<table>
            <tr>
                <td>No.WO</td>
                <td>
                    <input readonly type="text" name="no_wo" value="<?php echo $d['no_wo']; ?>">
                </td>
            </tr>

            <tr>
                <td>Kode Item</td>
                <td>
                    <input readonly type="text" name="kode" value="<?php echo $d['kode_item']; ?>">
                </td>
            </tr>

            <tr>
                <td>Nama Item</td>
                <td>
                    <textarea readonly  rows="4" cols="22" name="item" ><?php echo $d['nama_item']; ?></textarea>
                </td>
            </tr>

            <tr>
                <td>Jam Naik</td>
                <td>
                    <input readonly type="text" name="jam_naik" value="<?php echo gmdate ('Y-m-d H:i:s', time()+(60*60*7)); ?>">
                </td>
            </tr>

            <tr>
                <td>Batch</td>
                <td>
                    <input type="text" name="kode_batch" onkeyup="this.value=this.value.toUpperCase()" required value="<?php echo $d['kode_batch']; ?>">
                </td>
            </tr>

            <tr>
                <td>No. Bin</td>
                <td>
                    <input type="text" name="bin" value="<?php echo $d['bin']; ?>">
                </td>
            </tr>

            <tr>
                <td>Suhu</td>
                <td>
                    <input type="number" name="suhu" value="<?php echo $d['suhu']; ?>">
                </td>
            </tr>

            <tr>
                <td>RH</td>
                <td>
                    <input type="number" name="rh" value="<?php echo $d['rh']; ?>">
                </td>
            </tr>

            <tr>
                <td><input type="submit" value="Simpan"></td>
                <td>
                    
                </td>
            </tr>

        </table>    
	</form>
    <?php
    }
    ?>     
 
</body>
    
</html>

