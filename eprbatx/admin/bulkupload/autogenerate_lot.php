<?php require 'config.php'; ?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">
	<head> 
		<meta charset="utf-8">
		<title>Batx Energies Upload</title>
	</head>
	<body>
	
		<hr>
		<table border = 0>
			<tr>
				<td>#SR</td>
				<td>Lot No.</td>				
				<td>Cell No.</td>
				<td>Category</td>
			</tr>
			<?php
			$i = 1;
			$rows = mysqli_query($conn, "SELECT * FROM product_list");
			foreach($rows as $row) :
			?>
			<tr>
				<td> <?php echo $i++; ?> </td>
				<td> TACO 001</td>
				<td> - 001</td>
				<td> <?php echo $row["category"]; ?> </td>
			</tr>
			<?php endforeach; ?>
		</table>
		
		<?php
		if(isset($_POST["import"])){
			$fileName = $_FILES["excel"]["name"];
			$fileExtension = explode('.', $fileName);
      		$fileExtension = strtolower(end($fileExtension));
			$newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;

			$targetDirectory = "bulkupload/uploads/" . $newFileName;
			move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);

			error_reporting(0);
			ini_set('display_errors', 1);

			require 'excelReader/excel_reader2.php';
			require 'excelReader/SpreadsheetReader.php';

			$reader = new SpreadsheetReader($targetDirectory);
			foreach($reader as $key => $row){
				
				$code = $row[0];
				$cell_lot = $row[1];
				$weight = $row[2];
				$category = $row[3];
				$refurbished = $row[4];
				$recycle = $row[5];
				$status = $row[6];
				mysqli_query($conn, "INSERT INTO product_list VALUES('', '$code', '$cell_lot', '$weight','$category','$refurbished','$recycle',$status')");
			}

			echo
			"
			<script>
			alert('Succesfully Imported');
			document.location.href = '';
			</script>
			";
		}
		
		?>
	</body>
</html>
