<?php
include 'conf.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from customers where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); 

    $sql = "SELECT * from customers where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



 
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  
        echo '</script>';
    }


  
    
    else if($amount > $sql1['Balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';  
        echo '</script>';
    }
    


    
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {
        
               
                $newbalance = $sql1['Balance'] - $amount;
                $sql = "UPDATE customers set Balance=$newbalance where id=$from";
                mysqli_query($conn,$sql);
             

               
                $newbalance = $sql2['Balance'] + $amount;
                $sql = "UPDATE customers set Balance=$newbalance where id=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['Name'];
                $receiver = $sql2['Name'];
                $sql = "INSERT INTO transaction_history(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('Transaction Successful');
                             window.location='index.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" href="styletr.css">

</head>
<body>
 

<div class="container">
     <h2>Transaction</h2>
         <?php
            include 'conf.php';
             $sid=$_GET['id'];
            $sql = "SELECT * FROM  customers where id=$sid";
            $result=mysqli_query($conn,$sql);
            if(!$result)
            {
                 echo "Error : ".$sql."<br>".mysqli_error($conn);
            }
             $rows=mysqli_fetch_assoc($result);
        ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
    <div>
         <table class="table1">
          <thead>
             <tr>
                <th>Name</th>
                <th>Balance</th>
                <th>Email</th>
                <th>Phone Number</th>
            </tr>
        </thead>
             <tr>
                 <td><?php echo $rows['Name'] ?></td>
                <td  class = "bal"><?php echo $rows['Balance'] ?></td>
                <td><?php echo $rows['Email'] ?></td>
                <td><?php echo $rows['PhoneNumber'] ?></td>
            </tr>
        </table>
    </div>
 <br>
        <label>Transfer To:</label>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose</option>
            <?php
                include 'index.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM customers where id!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result))
                 {
            ?>
            <option class="table" value="<?php echo $rows['id'];?>" >
                
                <?php echo $rows['Name'] ;?> (Balance: <?php echo $rows['Balance'] ;?> ) 
               
            </option>
            <?php 
                } 
            ?>
       <div>
            </select>
    
            <br>
            <br>
            <label>Amount:</label>
            <input type="number" class="amount" name="amount" required>   
            <br>
            <br>
                <div class="butn" >
            <button class="btn" name="submit" type="submit">Transfer</button>
           
        </div>
        
         </form>
         
         
         <div class=discard>
        <a href="tab.php"><button >Discard</button></a>
        
       
            </div>
        
      </div>
</body>
</html>