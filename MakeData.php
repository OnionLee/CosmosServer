<?php

$db_host = "localhost";//주소
$db_user = "teamleaf"; 
$db_passwd = "lkh960412"; 
$db_name = "teamleaf"; 
$conn = mysqli_connect($db_host,$db_user,$db_passwd,$db_name);

$result = mysqli_query($conn,"SELECT * FROM 3DPlanetDT");


$Find_Id = FALSE;
$DataNum = 0;
while ($row = mysqli_fetch_array($result))//쿼리문을 이용해 데이터를 가져움 
//배열형태로 가져오며 key와 value로 나누어진 배열이다.
{
	$DataNum++;
}

echo $DataNum;
echo "\n";

$result2 = mysqli_query($conn,"SELECT * FROM 3DPlanetDT");

while ($row2 = mysqli_fetch_array($result2))//쿼리문을 이용해 데이터를 가져움 
//배열형태로 가져오며 key와 value로 나누어진 배열이다.
{

	echo  $row2['PlanetName'];
	echo "\n";
	echo  $row2['PlanetColor'];
	echo "\n";
	echo  $row2['PlanetSize'];
	echo "\n";
	echo  $row2['PlanetType'];
	echo "\n";
	echo  $row2['PlanetX'];
	echo "\n";
	echo  $row2['PlanatY'];
	echo "\n";
	echo  $row2['PlanetZ'];
	echo "\n";
}




?>
