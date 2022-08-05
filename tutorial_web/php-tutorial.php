<html>
	<head>
		<title>PHP Test Page</title>
	</head>	

	<body>
		This is Lambda Linux, running PHP
	
<?php
echo "Hello Worlds!";
$team = array("Mike", "Stef", "Ana");
$username = "M";
echo "<br>";
echo "The username is: $username";
echo "<br>";
echo 'The username is: $username ==> invalid';
echo "<br>";
echo $team[2];
echo "<br>";
$msgs = 7;
echo "you have " . $msgs . " messages";
echo "<br>";
$author = "banana";
$out = <<<_ENDDD
developers, developers,
dev, devvv
_ENDDD;
echo $out;
echo "<br>";
echo "This line " . __LINE__ . " of file " . __FILE__;

// practice class
$object = new Tiger();
echo "Tiger have...<br>";
echo "Fur: " . $object->fur . "<br>";
echo "Stripes: " . $object->stripes;

class Wildcat
{
	public $fur;
	function __construct()
	{
		$this->fur = 'TRUE';
	}
}

class Tiger extends Wildcat
{
	public $stripes;
	function __construct()
	{
		parent::__construct();
		$this->stripes = "TRUE";
	}
}
echo "<br>";
// array
$animal[] = "Cat";
$animal[] = "Dog";
print_r($animal);

// string
$d = 'Rasmus Lerdorf';
printf("[%12.8s]\n", $d);
printf("[%-12.12s]\n", $d);
printf("[%-'@12.10s]\n", $d);


phpinfo();
?>
	</body>
</html>
