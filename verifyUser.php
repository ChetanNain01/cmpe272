<?php 
    $password= $_POST['password'];
    $mobile= $_POST['mobile'];
    $verifyMobile="";
    $verifyPassword="";
    session_start();
    $myfile = fopen("creds.txt", "r");
    while(!feof($myfile)) {
        $line=fgets($myfile);
        if (strpos($line, 'mobile') !== false) {
            $verifyMobile=explode(":",$line)[1];
            $verifyMobile = trim($verifyMobile);
        }
        elseif(strpos($line, 'password') !== false)
        {
            $verifyPassword=explode(":",$line)[1];
            $verifyPassword = trim($verifyPassword);
        }
      }
    fclose($myfile);
    if ($verifyMobile==$mobile && $verifyPassword==$password){
        $_SESSION["allowed"]=true;
        header('location:admin.php');
    }
    else{
        header('location:login.php');
    }
?>