<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>No</th>
            <th>UserName</th>
            <th>Email</th>
            <th>Password</th>
        </tr>
        <?php
         $con = mysqli_connect("localhost","root","","database");
         $i = 0;
         $select = mysqli_query($con, "SELECT * FROM `registration`");
         $count = mysqli_num_rows($select);
         if($count > 0){
            while($row=mysqli_fetch_assoc($select)){
                $i++;
                ?>
                 <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                 </tr>
                <?php
            }
         }else{
            echo "Empty Data.";
         }
        ?>
    </table>
    <form action="pdf.php" method="php" style="margin-top:20px">
        <button type="submit" name="btn">Download PDF</button>
    </form>
</body>
</html>