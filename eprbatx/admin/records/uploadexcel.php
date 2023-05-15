<?php require 'config.php'; ?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">
	<head> 
		<meta charset="utf-8">
		<title>Import Files</title>
	</head>
	<body>
		<form class="" action="" method="post" enctype="multipart/form-data">
			<input type="file" name="excel" required value="">
			<button type="submit" name="import">File Import</button>
		</form>
		<hr>
		<table border = 1>
			<tr>
				<td>#Auth</td>
				<td>Weight</td>
				<td>Cell - Lot</td>
				<td>Category</td>
			</tr>
		
		</table>
		<?php
		if(isset($_POST["import"])){
			$fileName = $_FILES["excel"]["name"];
			$fileExtension = explode('.', $fileName);
      		$fileExtension = strtolower(end($fileExtension));
			$newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;
			$targetDirectory = "uploads/" . $newFileName;
			move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);
			error_reporting(0);
			ini_set('display_errors', 0);

			require 'excelReader/excel_reader2.php';
			require 'excelReader/SpreadsheetReader.php';
			$reader = new SpreadsheetReader($targetDirectory);
			foreach($reader as $key => $row){
				$celllot = $row[0];
				$category = $row[1];
				$code = $row[2];
				mysqli_query($conn, "INSERT INTO  epr VALUES('$celllot', '$category', '$code')");
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
