<?php

require('database.php');
$dbconf = $db[$active_group];
@$mysqli = new mysqli($dbconf['hostname'], $dbconf['username'], $dbconf['password'], $dbconf['dbprefix'] . $dbconf['database']);
if($mysqli->connect_errno) 
{
	die("Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
}

?>



<?php echo form_open_multipart('admin/employees/batch_upload');?>

<input type="file" name="userfile" size="100" />

<br /><br />

<input type="submit" value="Upload" />

</form>
