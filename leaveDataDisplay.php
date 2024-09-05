
<?php
	
	require('includes/connection/config.php');
	
	$params = $columns = $totalRecords = $data = array();

	$params = $_REQUEST;

	$columns = array(
		0 => 'empName',
		1 => 'empPhone', 
		2 => 'empEmail',
		3 => 'leavestartDate',
		4 => 'leaveendDate',
		5 => 'reason',
		6 => 'leaveStatus',
		7 => 'empID',
		8 => 'leaveID'

	);

	$where_condition = $sqlTot = $sqlRec = "";

    if (!empty($params['search']['value'])) {
        $where_condition .= " WHERE ";
        $search_value = $params['search']['value'];
        $where_condition .= " (empName LIKE '$search_value%' ";
        $where_condition .= " OR empPhone LIKE '$search_value%' ";
        $where_condition .= " OR empEmail LIKE '$search_value%' ";
        $where_condition .= " OR leaveStatus LIKE '$search_value%' ";
        $where_condition .= " OR reason LIKE '$search_value%') ";
    }
    

	$sql_query = " SELECT Employee_list.empID,Employee_list.empName,Employee_list.empPhone,Employee_list.empEmail,leaveRequest.leaveID,leaveRequest.leavestartDate,leaveRequest.leaveendDate,leaveRequest.reason,leaveRequest.leaveStatus FROM `leaveRequest` LEFT JOIN `Employee_list` ON leaveRequest.relatedEmpId = Employee_list.empID where leaveStatus='pending'";
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
		$empID=$row['empID'];
		$leaveID=$row['leaveID'];

		$subarray=array();
		$subarray[]=$row['empName'];
		$subarray[]=$row['empPhone'];
		$subarray[]=$row['empEmail'];
		$subarray[]=$row['leavestartDate'];
		$subarray[]=$row['leaveendDate'];
		$subarray[]=$row['reason'];
		$subarray[]="<a href='includes/backend/acceptLeave.php?id=$empID && leave=$leaveID' class='btn btn-sm btn-info'>Approved</a>
		<a href='includes/backend/rejectLeave.php?id=$empID && leave=$leaveID' class='btn btn-sm btn-danger'>Cancel</a>";

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
    



    