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

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
  	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link rel="stylesheet" href="css/style.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
              <!--Start Email Modal-->
              <a href="#addEmailModal" class="btn btn-success" data-toggle="modal"><i class="material-icons"></i> <span>Email</span></a>
              <div id="addEmailModal" class="modal fade">
            		<div class="modal-dialog">
            			<div class="modal-content">
            				<form id="email_form">
            					<div class="modal-header">
            						<h4 class="modal-title">Send Email</h4>
            						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            					</div>
            					<div class="modal-body">
                        <div class="form-group">
            							<label>Recepient Email</label>
            							<input type="email" id="email_u" name="email" class="form-control" required>
            						</div>
                        <div class="form-group">
                          <label>Subject</label>
                          <input type="text" id="subj_u" name="subject" class="form-control" required>
                        </div>
            						<div class="form-group">
            							<label>Body</label>
            							<textarea class="form-control" name="body" rows="8" cols="70"></textarea>
            						</div>
            					</div>
            					<div class="modal-footer">
            					    <input type="hidden" value="1" name="type">
            						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            						<button type="button" class="btn btn-success" id="btn-add">Add</button>
            					</div>
            				</form>
            			</div>
            		</div>
            	</div>
              <!--End Email Modal-->

              <!--Start SMS Modal-->
              <a href="#addSMSModal" class="btn btn-success" data-toggle="modal"><i class="material-icons"></i> <span>SMS</span></a>
              <div id="addSMSModal" class="modal fade">
            		<div class="modal-dialog">
            			<div class="modal-content">
            				<form id="sms_form">
            					<div class="modal-header">
            						<h4 class="modal-title">Send SMS</h4>
            						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            					</div>
            					<div class="modal-body">
            						<div class="form-group">
            							<label>Recepient Phone Number</label>
            							<input type="phone" id="phone" name="phone" class="form-control" required>
            						</div>
            						<div class="form-group">
            							<label>Message</label>
            							<textarea class="form-control" name="message" rows="8" cols="70"></textarea>
            						</div>
            					</div>
            					<div class="modal-footer">
            					    <input type="hidden" value="1" name="type">
            						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            						<button type="button" class="btn btn-success" id="btn-add">Add</button>
            					</div>
            				</form>
            			</div>
            		</div>
            	</div>
              <!--End SMS Modal-->
            </div>
            	<br />
            	<br />
                <div class="row filter_data">

                </div>
            </div>
        </div>

    </div>

<script src="js/ajax.js"></script>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
</body>

</html>
