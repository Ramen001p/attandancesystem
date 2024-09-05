<?php
	$count = attandanceCheck($conn);
		if ($count == 1) {
	?>
	
	    <div id="sticky-container" style="position:fixed; bottom:1%; width:100%;">
		
	        <button type="submit" id="departure" class="btn btn-danger btn-lg position-sticky" style="position:sticky;bottom:2%; left:90%;margin: 30px; padding: 20px;">
	            Register Departure
	        </button>
	    </div>

	<?php
	} else {
		?>
            <div id="sticky-container" style="position:fixed; bottom:0; width:100%;">
                <button type="submit" id="aparture" class="btn btn-success btn-lg position-sticky" style="position:sticky;bottom:2%; left:90%;margin: 30px; padding: 20px;">
                Register Attendance</button>
            </div>
        
	<?php
	}
?> 

<script>
	$(document).ready(function () {
    $("#aparture").click(function () { 
        $.ajax({
            type: "POST",
            url: "includes/ajax/attandanceRegister.php", 
            success: function (response) {
                alert(response);
            }
        });
		document.getElementById('sticky-container').style.display = "none";
    });
});

$(document).ready(function () {
	$("#departure").click(function () { 
		
		$.ajax({
			type: "POST",
			url: "includes/ajax/attandanceUpdate.php",
			success: function (data) {
				alert(data);
			}
		});

		
		
	});
});

</script>