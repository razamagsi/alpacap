<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./js/statuschange1.js" ></script>
    <?php
    include("connection.php");
    ?>
</head>
<body>
    <table cellpadding="5">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Status</th>
    </tr>
    <?php
    $query =mysqli_query($conn, "SELECT * FROM USER" );
 
    while($fetch = mysqli_fetch_assoc($query)){

       $id = $fetch['user_Id'];
       $email = $fetch['email'];
       $status = $fetch['status'];


    
    
    ?>
    <tr>
    <td><?=$id?></td>
    <td><?=$email?></td>
    <td id="status<?=$id?>">
    <?php
    if($status == 'Active'){
        ?>
        <button type="button" onclick="status_change(<?=$id?>)" style="color: green;" >Active</button>
    <?php
    }
    else{
        ?>
        <button type="button" onclick="status_change(<?=$id?>)" style="color: blue;" >Blocked</button>

        <?php
    }
    ?>
    </td>
</tr>
<?php

    }
?>
    </table>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function status_change(id){
            //alert();
            $.ajax({
              type: 'post',
              url: 'status.php',
              data: 'id:id',  
              success: function(data){
              $("#status"+id).html(data);
              
                }
                
            
            });
        }
    </script>
</body>
</html>