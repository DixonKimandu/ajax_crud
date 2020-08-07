<?php

//index.php

include('database_connection.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Email Filter</title>

    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href = "css/jquery-ui.css" rel = "stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
        	<br />
        	<h2 align="center">Email Filters</h2>
          <br />
            <div class="col-md-3">
              <div class="list-group">
					       <h3>OFFICE</h3>
                    <div class="filter">
					          <?php

                    $query = "SELECT DISTINCT(office) FROM email ORDER BY id DESC";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector office" value="<?php echo $row['office']; ?>"  > <?php echo $row['office']; ?></label>
                    </div>
                    <?php
                    }

                    ?>
                    </div>
                </div>

				        <div class="list-group">
					        <h3>COUNTRY</h3>
                  <div class="filter">
                    <?php

                    $query = "
                    SELECT DISTINCT(country) FROM email ORDER BY id DESC
                    ";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector country" value="<?php echo $row['country']; ?>" > <?php echo $row['country']; ?> </label>
                    </div>
                    <?php
                    }

                    ?>
                  </div>
                </div>

				        <div class="list-group">
					        <h3>COUNSELOR</h3>
                  <div class="filter">
					           <?php
                    $query = "
                    SELECT DISTINCT(counselor) FROM email ORDER BY id DESC
                    ";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector counselor" value="<?php echo $row['counselor']; ?>"  > <?php echo $row['counselor']; ?></label>
                    </div>
                    <?php
                    }
                    ?>
                </div>
              </div>
            </div>

            <div class="col-md-9">
              <div class="col-sm-8 balance">
              <input class="input" type="text" name="balance" value="">
              <input class="input btn btn-success" type="submit" name="get_balance" value="BALANCE">
            </div>
            <div class="col-sm-4">
              <input class="input btn btn-success" type="submit" name="get_balance" value="EMAIL">
              <input class="input btn btn-success" type="submit" name="get_balance" value="SMS">
            </div>
            	<br />
            	<br />
                <div class="row filter_data">

                </div>
            </div>
        </div>

    </div>

<script src="js/ajax.js"></script>

</body>

</html>
