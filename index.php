<?php	
	$inputName = "";
	$inputEmail = "";
	
	$cookieName1 = 'cookieName1';
	$cookieName2 = "cookieName2";	

	if( isset($_POST['submit']) ){
		$inputName = $_POST['inputName'];
		$inputEmail = $_POST['inputEmail'];
		setcookie($cookieName1, $inputName, time()+60*60*24*30);
		setcookie($cookieName2, $inputEmail, time()+60*60*24*30);
		
		header("Refresh:0");
		//echo "<meta http-equiv='refresh' content='0'>";
	}
	
	if( isset($_REQUEST['RemoveCookie']) ){
		unset($_COOKIE[$cookieName1]);
		unset($_COOKIE[$cookieName2]);
		setcookie($cookieName1, "", time()-60*60*24*30);
		setcookie($cookieName2, "", time()-60*60*24*30);		
	}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Cookie</title>
  </head>
  <body>
		<?php if( empty($_COOKIE[$cookieName1]) || empty($_COOKIE[$cookieName2]) ){ ?>
			<div class="container">
				<h2 class="text-center">Cookie</h2>
				<form  action="" method="POST" enctype="multipart/form-data">
				  <div class="mb-3">
					<label for="inputName" class="form-label">Name</label>
					<input type="text" class="form-control" id="inputName" name="inputName" value="<?php echo $inputName ?>">
				  </div>
				  
				  <div class="mb-3">
					<label for="inputEmail" class="form-label">Email address</label>
					<input type="email" class="form-control" id="inputEmail" name="inputEmail" value="<?php echo $inputEmail ?>">
				  </div>
				  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		<?php } ?>
	
	
		<?php if( isset($_COOKIE[$cookieName1]) || isset($_COOKIE[$cookieName2]) ) { ?>
			<div class="container">
				<?php
					if( !empty($_COOKIE[$cookieName1]) ){
						echo "Name: " . $_COOKIE[$cookieName1] . "<br/>";
					}
					if( !empty($_COOKIE[$cookieName2]) ){
						echo "Email: " . $_COOKIE[$cookieName2] . "<br/><br/>";
					}
				?>			
				<form action="" method="POST">
					<input type="submit" class="btn btn-primary" name="RemoveCookie" value="Remove Cookie">
				</form>			
			</div>
		<?php } else { ?>
			<div class="container mt-4">			
				<div class="alert alert-primary" role="alert">No cookie found</div>
			</div>
		<?php } ?>
	
	

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>