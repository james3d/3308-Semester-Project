<?PHP
if ($_FILES[csv][size] > 0) { 
$hostname = "localhost";
$username = "root";
$password = "hanniganlab";

// Connect to Database and Table
$dbhandle = mysql_connect($hostname, $username, $password)
    or die("Unable to connect to MySQL");

$selectdatabase = mysql_select_db("ypod",$dbhandle)
    or die("Could not select ypod database");

// Text File to read in
$uploaded = $_FILES['csv']['name'];
echo "->" . $uploaded;
if (!empty($uploaded)) {
	$query = "LOAD DATA LOCAL INFILE '" . $uploaded . "' INTO TABLE AQIQ_raw FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES ";
	echo $query;
	mysql_query($query) 
		or die('Error Loading Data File.<br>' . mysql_error());
	//echo "Upload success!";
}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<title>Import a CSV File with PHP & MySQL</title> 
</head> 

<body> 

<?php if (!empty($_GET[success])) { echo "<b>Your file has been imported.</b><br><br>"; } //generic success notice ?> 

<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1"> 
  Choose your file: <br /> 
  <input name="csv" type="file" id="csv" /> 
  <input type="submit" name="Submit" value="Submit" /> 
</form> 

</body> 
</html> 
