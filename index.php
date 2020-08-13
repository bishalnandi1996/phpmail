<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>phpmail</title>

<?php
	if(isset($_GET['status']) && ($_GET['status']==1)) {
		echo "<script>alert('Mail has been sent successfully')</script>";
	}
?>
</head>

<body style="overflow-x: hidden;">

<form name="frmMail" method="post" action="send_mail.php" enctype="multipart/form-data">
	<div class="form-group">
		<label>Email:</label>
		<div>
			<input type="email" name="frmEmail" required/>
		</div>
	</div>
	<div class="form-group">
		<label>Message:</label>
		<div>
			<textarea name="frmMsg" rows="4" cols="30" required></textarea>
		</div>
	</div>
	<div class="form-group">
		<label>Upload zip file (Max size 10MB):</label>
		<div>
			<input type="file" name="frmZipFile" accept=".zip"  style="border: none;"/>
		</div>
	</div>
	<div class="form-group">
		<input type="submit" value="Send Mail" />
	</div>
</form>

</body>
</html>



