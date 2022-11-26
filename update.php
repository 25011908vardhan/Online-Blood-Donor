<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
          <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <img class="bi me-2" width="40" height="32" src="./Images/mainIcon.png">
            <span class="fs-4">Blood Donation</span>
          </a>
    
          <ul class="nav nav-pills">
            <li class="nav-item"><a href="index.php" class="nav-link " aria-current="page">Donate</a></li>
            <li class="nav-item"><a href="info.php" class="nav-link">Delete</a></li>
            <li class="nav-item"><a href="search.php" class="nav-link ">Search</a></li>
            <li class="nav-item"><a href="update.php" class="nav-link active">Update</a></li>
          </ul>
        </header>
      </div>
      <div class="tableHeading font-weight-bold text-center text-uppercase m-4">
        <h2 >Donor's Data</h2>

        <form action="" method="post">
          <input type="number" name="id" id="id" placeholder="Donor's Id" class="text-center">
          <input type="text" name="region" id="region" placeholder="Update Region" class="text-center">
          <input type="text" name="phone" placeholder="Update Phone Number" class="text-center">
          <input type="submit" value="Update" name="submit">
        </form>
        </div>
    <div class="DonorsInformation ">
        <table class="table table-striped table-hover text-center mx-auto w-50">
            <thead>
          <tr>
            <th scope="col">Donor's Id</th>
            <th scope="col">Name</th>
            <th scope="col">Region</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Blood Group</th>
          </tr>
        </thead>
        <tbody>
            <?php
            include 'config.php';
            if(isset($_POST['submit'])){
                $id = $_POST["id"];
                $region = $_POST["region"];
                $phone = $_POST["phone"];
                $query="";
                $f=0;
                if(strlen($region)==0  && strlen($phone) != 0)
                {
                    $query = " update donorData set phone='$phone' where id='$id'";
                }
                else if(strlen($region)!=0  && strlen($phone) == 0)
                {
                    $query = " update donorData set region='$region' where id='$id'";
                }
                else if(strlen($region)!=0  && strlen($phone) != 0)
                {
                    $query = " update donorData set region = '$region', phone='$phone' where id='$id'";
                }
                else{
                    ?>
                    <script> alert("Empty Data Not Allowed");</script>
                    <?php
                    $f=1;
                }
                if($f==0)
                {$executed = mysqli_query( $con, $query );}

            }
            $query="select * from donorData";
            $query=mysqli_query($con,$query);
            while($row=mysqli_fetch_array($query))
            {
                ?>
                 <tr>
                     <th scope="row"> <?php echo $row['id']; ?> </th>
                     <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['region']; ?></td>
                  <td><?php echo $row['phone']; ?></td>
                  <td><?php echo $row['bloodGroup']; ?></td>
                </tr>
                <?php
              }

            ?>
        </table>
      </div>
</body>
</html>
<?php
mysqli_close($con);

?>