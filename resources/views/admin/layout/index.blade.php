<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Document</title>
	 <base href="{{asset(" ")}}">
		 <!-- Bootstrap Core CSS -->
    <link href="admin_assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">


      <!-- MetisMenu CSS -->
    <link href="admin_assets/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

           <!--    Sweetalert2 -->
    <link href="admin_assets/sweetalert2/sweetalert2.css" rel="stylesheet">

        <!-- Custom CSS -->
    <link href="admin_assets/css/demo.css" rel="stylesheet">

</head>
<body>

	<div id="wrapper">

		@include('admin.layout.header')
		
		@include('admin.layout.sidebar')
	
		
		@yield('content')
		
	
	</div> <!-- /wrapper -->




	  <!-- jQuery -->
    <script src="admin_assets/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="admin_assets/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Metis Menu Plugin JavaScript -->
    <script src="admin_assets/metisMenu/dist/metisMenu.min.js"></script>

	     	<!-- bootstrap-validator -->
	
	<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>

	<script src="admin_assets/sweetalert2/sweetalert2.all.min.js"></script>

    <script> 
	$(function() {

		    $("#menu").metisMenu();

		});

	</script>

	<script type="text/javascript">
	     $(document).ready(function () {
	         $('#sidebarCollapse').on('click', function () {
	             $('#sidebar').toggleClass('active');
	             $('#content').toggleClass('active');
	          
	         });
	     });
    </script>

	<script>
		function myFunction() {
		  var input, filter, table, tr, td, i;
		  input = document.getElementById("myInput");
		  filter = input.value.toUpperCase();
		  table = document.getElementById("myTable");
		  tr = table.getElementsByTagName("tr");
		  for (i = 0; i < tr.length; i++) {
		    td = tr[i].getElementsByTagName("td")[0];
		    if (td) {
		      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
		        tr[i].style.display = "";
		      } else {
		        tr[i].style.display = "none";
		      }
		    }       
		  }
		}
	</script>


	  <!--  chèn đoạn script  -->
    @yield('script')

	
</body>
</html>