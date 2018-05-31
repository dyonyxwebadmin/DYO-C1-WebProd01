<!DOCTYPE html>
<?php 
	$PageTitle = "<title>DYONYX | Cloud Questionnaire</title>";
?>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 10)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
	
	<?php includes("head") ?>

	<link href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
	<link href="//cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css">

</head>

<body>

	<!-- WRAPPER -->
	<div class="wrapper">
		
		<?php includes("header") ?>


		<main>
			
			<!-- ============================================================= SECTION – PRODUCT ============================================================= -->
			<h3>Contact Lists</h1>
				
			<table id="datatable-contacts" class="display" cellspacing="0" width="100%">
			</table>
			
			
		</main>


			

		<?php includes("footer") ?>

	</div>
	<!-- END WRAPPER -->

	<?php includes("js") ?>
	<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>	

	<script src="//cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
	<script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>

	<script>
	    $('#datatable-contacts').DataTable( {
		    "ajax": {
		        "url": "/api/contact/list",
		        "dataSrc": ""
		    },
		    "order": [[ 0, "desc" ]],
		    "columns": [
		        { "title": "First Name", "data": "first_name", "className":"link text-left text-nowrap", "orderable": true },
		        { "title": "Last Name", "data": "last_name", "className":"link text-left text-nowrap", "orderable": true },
		        { "title": "Company", "data": "company_name", "className":"link text-left", "orderable": true },
		        { "title": "Email", "data": "email", "className":"link text-left", "orderable": true },
		        { "title": "Phone", "data": "phone", "className":"link text-left", "orderable": true },
				{ "title": "Organization", "data": "organization", "className":"link text-center", "orderable": true },
		        { "title": "Barriers", "data": "barriers", "className":"link text-center", "orderable": true },
		        { "title": "Applications", "data": "applications", "className":"link text-center", "orderable": true },
		        { "title": "Computing", "data": "computing", "className":"link text-center", "orderable": true },
		        { "title": "Cloud", "data": "cloud", "className":"link text-center", "orderable": true },
		        { "title": "Department", "data": "department", "className":"link text-center", "orderable": true }
		    ],
	        dom: 'Bfrtip',
	        buttons: [
	            'copyHtml5',
	            'excelHtml5',
	            'csvHtml5',
	            'pdfHtml5'
	        ]
		});
	</script>

	<script>
		// $(document).ready(function(){ 
		// 	$(".changecolor").switchstylesheet( { seperator:"color"} );
		// });
	</script>
</body>

</html>
