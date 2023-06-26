<?php
    session_start();

    
    include("conn.php");
    include("function.php");

    
    $code=0;
	$data=[];
	$msg=["记录失败","记录成功"];//提示信息
    $id=time();

    $userAns=$_POST["userAns"];
    $userID=$_SESSION["user_id"];
    $questionID=$_SESSION["question_id"];

    date_default_timezone_set("PRC");
    $nowTime=date("Y-m-d h:i:s");
    
    $sql="UPDATE `doquestions` SET `answer`=? ,`update_date`=? WHERE user_id=? and question_id=?";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"ssii",$userAns,$nowTime,$userID,$questionID);
    mysqli_stmt_execute($stmt);
    if(mysqli_stmt_affected_rows($stmt)>0){
        $code=1;
    }else{
        $sql="INSERT INTO `doquestions`(`id`, `user_id`, `question_id`, `answer`, `build_date`, `update_date`) VALUES ('$id',?,?,?,?,?)";
        $stmt=mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_param($stmt,"iisss",$userID,$questionID,$userAns,$nowTime,$nowTime);
        mysqli_stmt_execute($stmt);
        if(mysqli_stmt_affected_rows($stmt)>0){
            $code=1;
        }
    }

    mysqli_close($conn);
    getApiResult($code, $msg[$code],$data);
?>