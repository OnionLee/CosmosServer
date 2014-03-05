<?php

$db_host = "localhost";//주소
$db_user = "teamleaf"; 
$db_passwd = "lkh960412"; 
$db_name = "teamleaf"; 
$conn = mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
 
$Player_id = $_GET['Player_Id'];
$Player_paw = $_GET['Player_PassWord'];

$LoginCross = TRUE;

$result = mysqli_query($conn,"SELECT * FROM 3DPlanetLG");

while ($row = mysqli_fetch_array($result))//쿼리문을 이용해 데이터를 가져움 
//배열형태로 가져오며 key와 value로 나누어진 배열이다.
{
	if($row['Player_Id'] == $Player_id)
	{
		$LoginCross = FALSE;
		break;
	}
}

if($LoginCross == FALSE)
{
	echo "CODE110";			//중복
	echo "<meta http-equiv='refresh' content='0; url=http://teamleaf.hubweb.net/3DPlanet/Register.html'>";
}
else
{
	mysqli_query($conn,"INSERT INTO 3DPlanetLG (Player_Id, Player_PassWord)
	VALUES ('$Player_id','$Player_paw')");
	echo "CODE100";//성공
}

echo "<meta http-equiv='refresh' content='0; url=http://teamleaf.hubweb.net/3DPlanet/Login.html'>";

?>
