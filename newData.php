
<?php
	
	$conn = new mysqli("localhost","root","","attendence_system");
if(!$conn){
    die("Error".$conn->error);
}
	
	$params = $columns = $totalRecords = $data = array();

	$params = $_REQUEST;

	$columns = array(
		0 => 'empID',
		1 => 'empName', 
		2 => 'empDesignation',
		3 => 'empPhone',
		4 => 'empAddress',
		5 => 'empGender',
		6 => 'empBloodGroup',
		7 => 'empDepartment',
		8 => 'empEmail'


	);

	$where_condition = $sqlTot = $sqlRec = "";

    if (!empty($params['search']['value'])) {
        $where_condition .= " WHERE ";
        $search_value = $params['search']['value'];
        $where_condition .= " (empName LIKE '$search_value%' ";
        $where_condition .= " OR empDesignation LIKE '$search_value%' ";
        $where_condition .= " OR empPhone LIKE '$search_value%' ";
        $where_condition .= " OR empEmail LIKE '$search_value%' ";
        $where_condition .= " OR empGender LIKE '$search_value%' ";
        $where_condition .= " OR empBloodGroup LIKE '$search_value%' ";
        $where_condition .= " OR empDepartment LIKE '$search_value%') ";
    }
    

	$sql_query = " SELECT * FROM `employee_list` ";
	$sqlTot .= $sql_query;
	$sqlRec .= $sql_query;
	
	if(isset($where_condition) && $where_condition != '') {

		$sqlTot .= $where_condition;
		$sqlRec .= $where_condition;
	}
	

 	$sqlRec .=  " ORDER BY ". $columns[$params['order'][0]['column']]."   ".$params['order'][0]['dir']."  LIMIT ".$params['start']." ,".$params['length']." ";

	$queryTot = mysqli_query($conn, $sqlTot) or die("Database Error:". mysqli_error($conn));

	$totalRecords = mysqli_num_rows($queryTot);

	$queryRecords = mysqli_query($conn, $sqlRec) or die("Error to Get the Post details.");

	while( $row = mysqli_fetch_assoc($queryRecords) ) { 
		$empId =$row['empID'];
		$subarray=array();
		$subarray[]=$row['empID'];
		$subarray[]=$row['empName'];
		$subarray[]=$row['empDesignation'];
		$subarray[]=$row['empPhone'];
		$subarray[]=$row['empAddress'];
		$subarray[]=$row['empGender'];
		$subarray[]=$row['empBloodGroup'];
		$subarray[]=$row['empDepartment'];
		$subarray[]=$row['empEmail'];
		$subarray[]="<a href='emp_profile.php?id=$empId' class='btn btn-sm btn-info'>View</a>";

		$data[] = $subarray;
	}	

	$json_data = array(
		"draw"            => intval( $params['draw'] ),   
		"recordsTotal"    => intval( $totalRecords ),  
		"recordsFiltered" => intval($totalRecords),
		"data"            => $data
	);

	echo json_encode($json_data);
?>
    



    