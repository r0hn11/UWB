<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","uwb");
    if($conn === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    if(isset($_POST['votp']))
    {
        $uname = $_SESSION['uname'];
        $uemail = $_SESSION['uemail'];
        $upw = $_SESSION['upw'];
        $uotp = $_POST['uotp'];
        echo $uemail;
        echo $uotp;
        if(isset($_COOKIE['otpcookie'])){
            unset($_COOKIE['otpcookie']);
            setcookie('otpcookie',null,-1,'/');
            $query = "select * from `user` where `Email-Id` = '$uemail' and `OTP` = '$uotp' ";
            $value = mysqli_query($conn,$query);
            $row = mysqli_fetch_array($value);
            if($row){
                $usql = mysqli_query($conn,"DELETE FROM `user` WHERE `user`.`Email-Id` = '$uemail'");
                $sql = "INSERT INTO `usermain` (`Username`, `Email-Id`, `Password`) VALUES ('$uname', '$uemail', '$upw')";
                $run = mysqli_query($conn,$sql);
                print_r($_COOKIE);
                session_unset();
                session_destroy();
                echo "
                    <script language='javascript'>
                        alert('OTP Verification Successfull...');
                        window.location.href = 'user-signup.html';
                    </script> ";
            }
            else{
                $usql = mysqli_query($conn,"DELETE FROM `user` WHERE `user`.`Email-Id` = '$uemail'");
                session_unset();
                session_destroy();
                echo "
                    <script language='javascript'>
                        alert('You entered incorrect OTP..Signup Again');
                        window.location.href = 'user-signup.html';
                    </script> ";
            }
    }
    else{
        $usql = mysqli_query($conn,"DELETE FROM `user` WHERE `user`.`Email-Id` = '$uemail'");
        unset($_COOKIE['otpcookie']);
        setcookie('otpcookie',null,-1,'/');
        session_unset();
        session_destroy();
        echo "
        <script language='javascript'>
            alert('Time Expired ..Please Verify your email again');
            window.location.href = 'user-signup.html';
        </script> ";
    }
}
?>