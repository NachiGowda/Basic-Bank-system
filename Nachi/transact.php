<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <link rel="stylesheet" href="styletra.css">
</head>

<body>



	<div class="container">
        <h2>Transaction History</h2>
        
       <br>
       <div class="table1">
    <table>
        <thead>
            <tr>
                <th>no</th>
                <th>Sender</th>
                <th>Receiver</th>
                <th>Amount</th>
                <th>Date & Time</th>
            </tr>
        </thead>
        <tbody>
        <?php

            include 'conf.php';

            $sql ="SELECT * from transaction_history";

            $query =mysqli_query($conn, $sql);

            while($rows = mysqli_fetch_assoc($query))
            {
        ?>

            <tr>
            <td><?php echo $rows['no']; ?></td>
            <td><?php echo $rows['sender']; ?></td>
            <td><?php echo $rows['receiver']; ?></td>
            <td><?php echo $rows['balance']; ?> </td>
            <td><?php echo $rows['datetime']; ?> </td>
            </tr>  
        <?php
            }

        ?>
        </tbody>
    </table>

    </div>
</div>