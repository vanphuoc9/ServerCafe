<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	 <base href="{{asset(" ")}}">
		 <!-- Bootstrap Core CSS -->
    <link href="admin_assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin_assets/css/demo.css" rel="stylesheet">
      <!-- MetisMenu CSS -->
    <link href="admin_assets/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
</head>
<body>

	<div id="wrapper">
		<div id="header">
			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			  <div class="container-fluid">
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>                        
			      </button>
			      <a class="navbar-brand" href="#" id="sidebarCollapse"><span class="glyphicon glyphicon-tasks"></span></a>
			    </div>
			    <div class="collapse navbar-collapse" id="myNavbar">
			    
			    <ul class="nav navbar-nav navbar-left">
			        <li><a href="#">Logo</a></li>
			    
			      
			      </ul>
			       <form class="navbar-form navbar-left " action="/action_page.php">
					  <div class="input-group form-search">
					    <input type="text" class="form-control" placeholder="Tìm kiếm">
					    <div class="input-group-btn">
					      <button class="btn btn-default" type="submit">
					        <i class="glyphicon glyphicon-search"></i>
					      </button>
					    </div>
					  </div>
					</form> 
			      <ul class="nav navbar-nav navbar-right">
			      	  <li><a href="#" style="color:red;text-transform:uppercase;"><span class="glyphicon glyphicon-log-out"></span> Đăng xuất</a></li>
			      </ul>
			    </div>
			  </div>
			</nav>
		</div>


		<nav class="nav" id="sidebar">

			<div class="row sidebar-header">
				<div class="col-xs-4 sidebar-img">
					<img src="admin_assets/img/h.jpg" class="img-circle img-responsive" alt="Cinque Terre" width="43" > 
				</div>
				<div class="col-xs-8 sidebar-content-icon">
					<span>Chào, <strong style="color:white;">Nghĩa</strong></span><br>
					<a href=""><span class="glyphicon glyphicon-envelope sidebar-icon"></span></a>
					<a href=""><span class="glyphicon glyphicon-user sidebar-icon"></span></a>
					<a href=""><span class="glyphicon glyphicon-cog sidebar-icon"></span></a>
				</div>
						
			</div> <!-- row sidebar-->
			<hr>

			<div class="row">
				<div class="col-xs-12">
					<ul class="list-unstyled components" id="menu">
						<li>
							<a href="#home" data-toggle="collapse" aria-expanded="false" class="active">
								<i class="glyphicon glyphicon-home"></i>
								Quản lý
							</a>
							<ul class="collapse list-unstyled" id="home">
								 <li><a href="#">Home 1</a></li>
	                            <li><a href="#">Home 2</a></li>
	                            <li><a href="#">Home 3</a></li>
							</ul>
						</li>
						<li>
							<a href="#home1" data-toggle="collapse" aria-expanded="false">
								<i class="glyphicon glyphicon-home"></i>
								Quản lý menu
							</a>
							<ul class="collapse list-unstyled" id="home1">
								 <li><a href="#">Home 1</a></li>
	                            <li><a href="#">Home 2</a></li>
	                            <li><a href="#">Home 3</a></li>
							</ul>
						</li>
					</ul>
				
				</div>

			</div>	
		</nav><!--  sidebar -->

		<div id="content">
			<div class="container-fluid">
				<div id="header-content">
					  <!-- Header -->
					<div class="row">
						<div class="col-md-3">
							<div class="header-content messages">
								<a href="#">
									<span class="glyphicon glyphicon-comment "> <span class="badge">3</span></span>
									<h4>Messages </h4>
								</a>
							</div>
							
						
						</div>

						<div class="col-md-3">
							<div class="header-content view">
								<a href="#">
									<span class="glyphicon glyphicon-comment"> <span class="badge">3</span></span>
									<h4>Views </h4>
								</a>
							</div>
							
						
						</div>
						<div class="col-md-3">
							<div class="header-content share">
								<a href="#">
									<span class="glyphicon glyphicon-comment"> <span class="badge">3</span></span>
									<h4>Shares </h4>
								</a>
							</div>
							
						
						</div>
						<div class="col-md-3">
							<div class="header-content user">
								<a href="#">
									<span class="glyphicon glyphicon-comment"> <span class="badge">3</span></span>
									<h4>Users </h4>
								</a>
							</div>
							
						
						</div>

				
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="page-header">
							<h1>Danh sách</h1>
							<button class="btn btn-primary btn-them" data-toggle="modal" data-target="#myModal">Thêm nhân viên</button>
							
						</div>
						<input class="form-control" id="myInput" onkeyup="myFunction()" type="text" placeholder="Tìm theo tên...">
					</div>
				</div>

				<div class="row">
					<table class="table table-striped table-bordered table-hover" id="myTable">
					  <thead>
					      <tr>
					        <th>Firstname</th>
					        <th>Lastname</th>
					        <th>Email</th>
					      </tr>
					   </thead>
					   <tbody>
					      <tr>
					        <td>John</td>
					        <td>Doe</td>
					        <td>john@example.com</td>
					      </tr>
					      <tr>
					        <td>Mary</td>
					        <td>Moe</td>
					        <td>mary@example.com</td>
					      </tr>
					      <tr>
					        <td>July</td>
					        <td>Dooley</td>
					        <td>july@example.com</td>
					      </tr>
					   </tbody>
	  				</table>
				</div>
				

			     <!-- Modal -->
	             <div class="modal fade" id="myModal" role="dialog">
	                  <div class="modal-dialog">
	                        
	                        <!-- Modal content-->
	                     <div class="modal-content">
	                        <div class="modal-header">
	                           <button type="button" class="close" data-dismiss="modal">&times;</button>
	                           <h4><span class="glyphicon glyphicon-lock"></span>Thêm</h4>
	                        </div> <!-- /modal-header -->

	                        <div class="modal-body">
	                           <form action="" role="form">
	                              <div class="form-group">
	                                 <label for="usrname"><span class="glyphicon glyphicon-user"></span> Họ tên</label>
	                                 <input type="text" class="form-control" id="usrname" placeholder="Họ tên">
	                              </div>
	                              <div class="form-group">
	                                 <label for="phone"><span class="glyphicon glyphicon-phone"></span> Số điện thoại</label>
	                                 <input type="text" class="form-control" id="phone" placeholder="Số điện thoại">
	                              </div>
	                              <button class="btn btn-block">Thêm
	                                  <span class="glyphicon glyphicon-ok"></span></button>
	                           </form>
	                        </div> <!-- /modal-body -->

	                        <div class="modal-footer">
	                           <button class="btn btn-danger btn-default pull-left" data-dismiss="modal">
	                              <span class="glyphicon glyphicon-remove"></span>
	                                 Trờ về
	                           </button>
	                           <p>Need <a href="#">help?</a></p>
	                        </div> <!-- /modal-footer -->

	                     </div> <!-- /Modal content-->


	                  </div> <!-- /modal-dialog -->
	                     
	               </div> <!-- Modal -->


			</div>
		</div>	<!-- content -->







	</div> <!-- /wrapper -->




	  <!-- jQuery -->
    <script src="admin_assets/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="admin_assets/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Metis Menu Plugin JavaScript -->
    <script src="admin_assets/metisMenu/dist/metisMenu.min.js"></script>
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

	
</body>
</html>