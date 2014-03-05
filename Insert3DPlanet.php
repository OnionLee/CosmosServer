<?php

$db_host = "localhost";//주소
$db_user = "teamleaf"; 
$db_passwd = "lkh960412"; 
$db_name = "teamleaf"; 
$conn = mysqli_connect($db_host,$db_user,$db_passwd,$db_name);

$//Token = $_GET['Token'];
//if(!$Token)
//{
//	echo '쿠키가져옴';
	//$Token = $_COOKIE['token'];
//}
$PlanetName = $_GET['PlayerId'];
$PlanetColor = $_GET['PlanetColor'];
$PlanetSize = $_GET['PlanetSize'];
$PlanetType = $_GET['PlanetType'];
$PlayerId = $_GET['PlayerId'];

//회원정보 데이터 가져옴
/*$result = mysqli_query($conn,"SELECT * FROM 3DPlanetTk");

while ($row = mysqli_fetch_array($result))//쿼리문을 이용해 데이터를 가져움 
//배열형태로 가져오며 key와 value로 나누어진 배열이다.
{
	if($Token == $row['PlayerToken'])
	{
		$PlayerId = $row['PlayerID'];
		break;
	}
}



*/
$Find_Id = FALSE;
$result2 = mysqli_query($conn,"SELECT * FROM 3DPlanetDT");

/*
while ($row2 = mysqli_fetch_array($result2))//쿼리문을 이용해 데이터를 가져움 
//배열형태로 가져오며 key와 value로 나누어진 배열이다.
{
	if($PlayerId == $row2['Player_ID'])
	{
		$Find_Id = TRUE;
		break;
	}
}

if($Find_Id == TRUE)
{
	mysqli_query($conn,"UPDATE  `teamleaf`.`3DPlanetDT` 
	SET  
	`PlanetName` =  '$PlanetName',
	`PlanetColor` =  '$PlanetColor',
	`PlanetSize` =  '$PlanetSize',
	`PlanetType` =  '$PlanetType',
	`CreateTime` =  CURRENT_TIMESTAMP 
	WHERE  `3DPlanetDT`.`Player_ID` =  '$PlayerId';");
	
}
else
{
 */
	$PlanetX = rand(-10000,10000);
	$PlanetY = rand(-10000,10000);
	$PlanetZ = rand(-10000,10000);
	
	mysqli_query($conn,"INSERT INTO `teamleaf`.`3DPlanetDT` 
	(`Player_ID`, `PlanetName`, `PlanetColor`, `PlanetSize`, `PlanetType`, `CreateTime`, `PlanetX`, `PlanatY`, `PlanetZ`) 
	VALUES ('$PlayerId', '$PlayerId', '$PlanetColor', '$PlanetSize', '$PlanetType', CURRENT_TIMESTAMP, '$PlanetX', '$PlanetY', '$PlanetZ');");

	echo "<meta http-equiv='refresh' content='0; url=http://teamleaf.hubweb.net/3DPlanet/Insert.html'>";

?>




