<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Money</title>
    <link rel="stylesheet" href="stylet.css">
    

    
</head>

<body>
<?php
    include 'conf.php';
    $sql = "SELECT * FROM customers";
    $result = mysqli_query($conn,$sql);
?>



<div class="container">
        <h2>Transfer Money</h2>
        <br>
                <div class="table1">
                        <table>
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col" >Name</th>
                            <th scope="col" >Balance</th>
                            <th scope="col" >E-Mail</th>
                            <th scope="col" >Phone Number</th>
                            <th scope="col" >Operation</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                <?php 
                    while($rows=mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                        <td><?php echo $rows['id'] ?></td>
                        <td><?php echo $rows['Name'] ?></td>
                        <td><?php echo $rows['Balance']?></td>
                        <td><?php echo $rows['Email']?></td>
                        <td><?php echo $rows['PhoneNumber']?></td>
                        <div class=bt>
                        <td><a href="trans.php?id= <?php echo $rows['id'] ;?>"> <button type="button" class="btn">Transfer</button></a></td> 
                    </div>
                    </tr>
                <?php
                    }
                ?>
            
                        </tbody>
                    </table>
         </div>
     </div>
 </body>
</html>
                