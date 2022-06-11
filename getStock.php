<?php
    session_start();
    if(isset($_SESSION['fname'])){
    include('includes/connection.php');
    $query = "select * from medicines;";
    $query_run = mysqli_query($connection,$query);
?>
<html>
    <head>
        <!-- CSS File -->
        <link rel="stylesheet" href="css/style.css">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <!-- jQuery files -->
        <script src="jquery/jQuery.min.js"></script>
        <!-- Fontawesome -->
        <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    </head>
    <body>
        <div class="row">
            <div class="col-md-4 m-auto"><br><br>
                <center><h5>Total available stock</h5></center>
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Price</th>
                            <th>stock</th>
                        </tr>
                        <tbody>
                        <?php 
                            $sno = 0;
                            while($row = mysqli_fetch_assoc($query_run)){
                                $sno += 1;
                                ?>
                                <tr>
                                <td><?php echo $sno;?></td>
                                <td><?php echo $row['name'];?></td>
                                <td><?php echo $row['type'];?></td>
                                <td><?php echo $row['price'];?></td>
                                <td><?php echo $row['stock'];?></td>
                            </tr>
                            <?php
                            }
                        ?>
                        </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </body>
</html>
<?php
    }
    else{
        header('location:index.php');
    }
?>
    