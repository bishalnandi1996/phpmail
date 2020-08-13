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

	<style>
		.form-group {
			margin-top: 15px;
		}
		
		.frm-input {
			border: 1px solid #a5a5a5;
			border-radius: 0px;
		}
		
		div {
			margin-top: 5px;
		}
	</style>

</head>

<body style="overflow-x: hidden;">

<form name="frmMail" method="post" action="send_mail.php" enctype="multipart/form-data" >
	<div class="form-group">
		<label>Email:</label>
		<div>
			<input type="email" class="frm-input" name="frmEmail" required/>
		</div>
	</div>
	<div class="form-group">
		<label>Message:</label>
		<div>
			<textarea name="frmMsg" class="frm-input" rows="4" cols="30" required></textarea>
		</div>
	</div>
	<div class="form-group">
		<label>Upload zip file:</label>
		<div>
			<input type="file" name="frmZipFile" class="frm-input" accept=".zip"  style="border: none;"/>
		</div>
	</div>
	<div class="form-group">
		<input type="submit" class="frm-input" value="Send Mail" style="padding: 10px; background: #20c652; color: #ffffff;" />
	</div>
</form>

</body>
</html>



