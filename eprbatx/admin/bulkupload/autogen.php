<!doctype html>
<?php 
        $slno4=0;		
			
	/*code for auto sl. no. */
	function autoslno()
	{    
          $conn=mysqli_connect("localhost","root","",
"databasename"); 

	   $res=mysqli_query($conn,"select slno5 from employee");
	   while($row=mysqli_fetch_array($res))
	   {      
	      $slno4=$row['slno5'];
	   }
	   $slno4=$slno4+1;
           // $slno4= "BRQ/2019/". $slno4;  //Customized form of serial no.
	}
			
	autoslno();     //calling of autosno() function at page load event/where you need.

?>

   //-------------------------  OR  ------------------------------
<!doctype html>
<?php 
        $slno4=0;
        $val=0;		
			
	/*code for auto sl. no. */
	function autoslno()
	{    
          $conn=mysqli_connect("localhost","root","",
"sts_db"); 

	   $res=mysqli_query($conn,"select slno5 from employee");
	   while($row=mysqli_fetch_array($res))
	   {      
	      $slno4=$row['slno5'];
              if($slno4>$val)
                {
                  $val=$slno4;
                }
	   }
	   $slno4=$val+1;
           // $slno4= "BRQ/2019/". $slno4;  //Customized form of serial no.
	}
			
	autoslno();     //calling of autosno() function at page load event/where you need.

?>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   				
   <title>Untitled Document</title>
</head>
<body>  	
        <form class="form-group" name="form1" id="form2" action="" method="post">				
	  <div class="form-group" style="margin-top:25px">
	   <center>
	      <h2>User Registration Page</h2>				
	      <table>
		<tr>
		   <td>SlNo.</td>
		   <td>: </td>
		   <td><input type="text" name="slno1" id="slno2" readonly value="<?php echo $slno4;?>">
                   </td>
		</tr>	
						
		<tr>
		   <td><label for="Nm1">User Name</label></td>
		   <td>:</td>
		   <td><input type="text" class="form-control" name="uname1" id="uname2" autofocus>
		   </td>
		</tr>						
	      </table>
	      <button type="submit" name="Submit1">Submit</button>
	      <button type="submit" name="Delete">Delete</button>
	    </center>
	  </div>	
        </form>	
     </body>
   </html>
