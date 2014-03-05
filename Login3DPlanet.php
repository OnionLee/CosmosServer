<?php

$db_host = "localhost";//주소
$db_user = "teamleaf"; 
$db_passwd = "lkh960412"; 
$db_name = "teamleaf"; 
$conn = mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
 
$Player_id = $_GET['Player_Id'];
$Player_paw = $_GET['Player_PassWord'];

$LoginAcess = FALSE;

//회원정보 데이터 가져옴
$result = mysqli_query($conn,"SELECT * FROM 3DPlanetLG");

while ($row = mysqli_fetch_array($result))//쿼리문을 이용해 데이터를 가져움 
//배열형태로 가져오며 key와 value로 나누어진 배열이다.
{
	//비번과 아이디가 같은게 있으면 가져옴
	if($row['Player_Id'] == $Player_id)
	{
		if($row['Player_PassWord'] == $Player_paw)
		{
			$LoginAcess = TRUE;
			break;
		}
	}
	
}

//비번 틀리거나 아디 틀리면 로그인 실패
if($LoginAcess == FALSE)
{
	echo "<meta http-equiv='refresh' content='0; url=http://teamleaf.hubweb.net/3DPlanet/Login.html'>";
}
else//로그인 성공시 처리해야하는 일들
{
	$LoginCross = FALSE;
	
	//토큰과 아이디 저장하는 데이터 가져옴
$result = mysqli_query($conn,"SELECT * FROM 3DPlanetTk");
while ($row = mysqli_fetch_array($result))//쿼리문을 이용해 데이터를 가져움 
//배열형태로 가져오며 key와 value로 나누어진 배열이다.
{
	//혹시 아이디가있다면
	if($row['PlayerID'] == $Player_id)
	{
		$LoginCross = TRUE;
		break;
	}
	
}
	$char_arr = array('a','b','c','d','e','f','g','h','i','j',
						'k','l','n','m','o','p','q','r','s','t',
						'0','1','2','3','4','5','6','7','8','9','x','y');
	shuffle($char_arr);
	$token = join($char_arr);

if($LoginCross == TRUE)	//토큰발급한적이 있음
{
	mysqli_query($conn,"UPDATE 3DPlanetTk SET 
	PlayerToken='$token', 
	CreateTime =  CURRENT_TIMESTAMP 
	WHERE  PlayerID ='$Player_id'");
}
else 					//토큰발급한적이 없음
{
	mysqli_query($conn,"INSERT INTO 3DPlanetTk (PlayerID, PlayerToken)
	VALUES ('$Player_id','$token')");
}
	
	echo $token;
	setcookie("token",$token);
}


echo "<meta http-equiv='refresh' content='0; url=http://teamleaf.hubweb.net/3DPlanet/Insert.html'>";
?>