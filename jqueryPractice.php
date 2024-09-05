<!DOCTYPE html>
<html>
<head>
    <script src="includes/js/jquery.js"></script> 
    <script src="includes/datatable/media/js/jquery.dataTables.min.js"></script> 
    <link href="includes/datatable/media/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css">
</head>
<body>

<table id="dtExample" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Designation</th>
            <th>Phone</th>
            <th>Email date</th>
            <th>Address</th>
            <th>Gender</th>
            <th>Blood Group</th>
            <th>Department</th>
            <th>Img</th>
            <th>Date Of Birth</th>
            <th>Date Of Join</th>
            <th>Internship Start</th>
            <th>Internship End</th>
            <th>Martial Status</th>
        </tr>
    </thead>
</table>

<script>
    $(document).ready(function() {
        $('#dtExample').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "fetchData.php"
        });
    });
</script>
 
</body>
</html>
