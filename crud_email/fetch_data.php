<?php

//fetch_data.php

include('database_connection.php');

if(isset($_POST["action"]))
{
	$query = "
		SELECT * FROM email WHERE id > 0
	";

	if(isset($_POST["office"]))
	{
		$brand_filter = implode("','", $_POST["office"]);
		$query .= "
		 AND office IN('".$brand_filter."')
		";
	}
	if(isset($_POST["country"]))
	{
		$ram_filter = implode("','", $_POST["country"]);
		$query .= "
		 AND country IN('".$ram_filter."')
		";
	}
	if(isset($_POST["counselor"]))
	{
		$storage_filter = implode("','", $_POST["counselor"]);
		$query .= "
		 AND counselor IN('".$storage_filter."')
		";
	}

	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$output = '';
	if($total_row > 0)
	{
		$output='<table class="table table-hover table-responsive">
		<tr>
		<th style="text-align: left; padding-left: 40px;">NAME</th>
		<th style="text-align: left; padding-left: 40px;">OFFICE</th>
		<th style="text-align: left; padding-left: 40px;">COUNTRY</th>
		<th style="text-align: left; padding-left: 40px;">COUNSELOR</th>
		<th style="text-align: left; padding-left: 40px;">EMAIL</th>
		<th style="text-align: left; padding-left: 40px;">PHONE NO</th>
		</tr>';
		foreach($result as $row)
		{

			$output .= '

			<tr style="">
			<td style="text-align: left; padding-left: 40px;">'. $row['name'] .'</td>
			<td style="text-align: left; padding-left: 40px;">'. $row['office'] .'</td>
			<td style="text-align: left; padding-left: 40px;">'. $row['country'] .'</td>
			<td style="text-align: left; padding-left: 40px;">'. $row['counselor'] .'</td>
			<td style="text-align: left; padding-left: 40px;">'. $row['email'] .'</td>
			<td style="text-align: left; padding-left: 40px;">'. $row['phone_no'] .'</td>
			</tr>

			';
		}

		'</table>';

	}
	else
	{
		$output = '<h3>No Data Found</h3>';
	}
	echo $output;
}

?>
