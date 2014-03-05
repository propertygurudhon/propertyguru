<?php
$fn = 1;
$tn = 25;
if (isset($_POST['number'])) $fn = $_POST['number'];
if (isset($_POST['number2'])) $tn = $_POST['number2'];


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<form method="post">
	Input Integer:  FROM <input type="text" name="number" value="<?php echo $fn; ?>" /> - TO <input type="text" name="number2" value="<?php echo $tn; ?>" /><br />
    <input type="submit" name="EXEC" value="Execute" />
</form>

<pre>
<?php
if (isset($_POST['EXEC'])) {
	$fizz = 0;
	$buzz = 0;
	for ($i = $fn; $i <= $tn; $i++) {
		if ( ($i % (3*5)) == 0) {
			echo "FizzBuzz ";
		} elseif ( ($i % 3) == 0) {
			$fizz = 1;
			echo "Fizz ";
		} elseif ( ($i % 5) == 0) {
			$buzz = 1;
			echo "Buzz ";
		} else {
			if ($fizz+$buzz == 2) {
				echo "Bazz ";
			} else {
				echo $i. " ";
			}
			$fizz = 0;
			$buzz = 0;
		}
	}
} else {
	echo "Please input the number above.";
}
?>
</pre>

<body>
</body>
</html>
