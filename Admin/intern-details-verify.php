<?php
    if(isset($_POST['submit'])){
        include 'conn.php';
        if($conn === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
    }
        $aadhar = $_POST['aadhar'];
        $query = "select * from `details` where `Aadhar Card` = '$aadhar'";
        $sql = mysqli_query($conn,$query);
        $row = mysqli_fetch_array($sql);
        if($row){
                echo "
                    <script language='javascript'>
                        alert('Aadhar number already registered');
                        window.location.href = 'intern-details-entry.html';
                    </script> ";
        }
        $email = $_POST['email'];
        $query = "select * from `details` where `Email-Id` = '$email'";
        $sql= mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($sql);
        if($row){
            echo "
                    <script language='javascript'>
                        alert('Email id already registered');
                        window.location.href = 'intern-details-entry.html';
                    </script> ";
        }
        $phone = $_POST['phone'];
        $query = "select * from `details` where `Phone No.` = '$phone'";
        $sql= mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($sql);
        if($row){
            echo "
                    <script language='javascript'>
                        alert('Mobile number already registered');
                        window.location.href = 'intern-details-entry.html';
                    </script> ";
        }
        $wpno = $_POST['wpno'];
        $query = "select * from `details` where `Whatsapp No.` = '$wpno'";
        $sql= mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($sql);
        if($row){
            echo "
                    <script language='javascript'>
                        alert('Whatsapp number already registered');
                        window.location.href = 'intern-details-entry.html';
                    </script> ";
        }
?>