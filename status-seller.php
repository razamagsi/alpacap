<?php

    
    include('connection.php');

    $id = $_REQUEST['id'];
    $status = $_REQUEST['status'];
    //echo'<script> consol.log(#statusbtn) </scritp>';
    if($status == 'Active'){

        $update=mysqli_query($conn, "UPDATE user SET STATUS = 'Blocked' WHERE user_Id ='$id'");
        
        echo " Seller Blocked";
    }
    else{
        $update=mysqli_query($conn, "UPDATE user SET STATUS = 'Active' WHERE user_Id ='$id'");
        
        echo "Seller Active";
    }
    

?>