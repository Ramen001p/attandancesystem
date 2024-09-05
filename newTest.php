<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require('includes/common/common-dataTable-cdn.php');?>
</head>
<body>
<table id="dtExample" class="display cell-border hover " style="width:50%;">
										<thead>
                                            <th class="text-center">Id</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Designation</th>
                                            <th class="text-center">Phone</th>
                                            <th class="text-center">Email date</th>
                                            
										</thead>
									</table>
                                    <?php 
    require('includes/common/common-js.php');
    ?> 
    <script>
        $(document).ready( function () {
		$('#dtExample').DataTable({
            "processing" : true,
        "serverSide" : true,
        "ajax" : "newData.php"
        });
	} );
    </script>
</body>
</html>