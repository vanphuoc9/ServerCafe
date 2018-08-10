@extends('admin.layout.index')

@section('content')
	
	<div id="content">
			<div class="container-fluid">
				
				
				<div class="row">
					<div class="col-lg-12">
						<div class="page-header">
							<h1>Danh sách loại món</h1> 
							<button class="btn btn-primary btn-them" data-toggle="modal" data-target="#myModalThem">Thêm loại món</button>
							
						</div>
						<input class="form-control" id="myInput" onkeyup="myFunction()" type="text" placeholder="Tìm theo tên...">
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						<table class="table table-striped table-bordered table-hover" id="myTable">
						  <thead>
						      <tr>
						        <th>Tên loại</th>
						        <th>Hình</th>
						        <th>Xóa</th>
						        <th>Sửa</th>
						      </tr>
						   </thead>
						   <tbody>
						   	@foreach($loaimon as $lm)
						      <tr class="odd gradeX" align="center">
						        <td>{{$lm->TENLOAI}}</td>
                                <td><img src="{{$lm->HINH}}" width="100px" height="100px"></td>
                         		<td class="center"><i class="glyphicon glyphicon-remove"></i><a href="" data-id="{{$lm->MALOAI}}" id="btnXoa">Xóa</a></td>
                                <td class="center"><i class="glyphicon glyphicon-pencil"></i> <a href="" data-id="{{$lm->MALOAI}}" id="btnSua">Sửa</a></td>
                       <!--          <td class="center"><i class="glyphicon glyphicon-pencil"></i> <a href="admin/loaimon/sua/{{$lm->MALOAI}}" data-toggle="modal" data-target="#myModalSua" id="btnSua">Sửa</a></td> -->
						      </tr >
						     @endforeach
						 
						   </tbody>
		  				</table>
	  				</div>
				</div>
				
				 @if(session('thongbao'))
                   <div class="alert alert-success" id="SUCCESS">
                      {{session('thongbao')}}
                       
                   </div>
                @endif


              @if(count($errors) > 0)
                 <div class="alert alert-danger" id="ERROR_COPY"
                >
            
                   <!--  in ra các lỗi -->
                     @foreach($errors->all() as $err)
                        {{$err}} <br>
                      
                     @endforeach
                 </div>
              
              @endif

			     <!-- Modal Insert-->
	             <div class="modal fade" id="myModalThem" role="dialog">
	                  <div class="modal-dialog">
	                        
	                        <!-- Modal content-->
	                     <div class="modal-content">
	                        <div class="modal-header">
	                           <button type="button" class="close" data-dismiss="modal">&times;</button>
	                           <h4><span class="glyphicon glyphicon-lock"></span>Thêm</h4>
	                             <!--   kiểm tra lỗi -->
	                     
	                        </div> <!-- /modal-header -->

	                        <div class="modal-body">
	                           <form class="ValidatorFrom" action="admin/loaimon/them" role="form" data-toggle="validator" method="POST" >
	                              <div class="form-group">
	                                 <label for="Ten"><span class="glyphicon glyphicon-user"></span> Tên loại món</label>
	                                 <input type="text" class="form-control" placeholder="Tên loại món..." name="Ten">
	                              </div>
	                              <div class="form-group">
	                                 <label for="LinkHinh"><span class="glyphicon glyphicon-phone"></span> Link hình</label>
	                                 <input type="text" class="form-control" placeholder="Link hình..." name="LinkHinh">
	                              </div>
	                              <button type="submit" class="btn btn-block">Thêm
	                                  <span class="glyphicon glyphicon-ok"></span></button>
	                               <input type="hidden" name="_token" value="{{csrf_token()}}">
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
				

				  <!-- Modal Update -->
	             <div class="modal fade" id="myModalSua" role="dialog">
	                  <div class="modal-dialog">
	                        
	                        <!-- Modal content-->
	                     <div class="modal-content">
	                        <div class="modal-header">
	                           <button type="button" class="close" data-dismiss="modal">&times;</button>
	                           <h4><span class="glyphicon glyphicon-lock"></span>Sửa</h4>
	                       
	                     
	                        </div> <!-- /modal-header -->
	                        <div class="modal-body">
	                           <form class="ValidatorFrom" action="" role="form" data-toggle="validator" method="POST" id="updateFrom" >
	                              <div class="form-group">
	                                 <label for="Ten"><span class="glyphicon glyphicon-user"></span> Tên loại món</label>
	                                 <input type="text" class="form-control" placeholder="Tên loại món..." name="Ten" value="" id="Ten">
	                              </div>
	                              <div class="form-group">
	                                 <label for="LinkHinh"><span class="glyphicon glyphicon-phone"></span> Link hình</label>
	                                 <input type="text" class="form-control" placeholder="Link hình..." name="LinkHinh" value="" id="LinkHinh">
	                              </div>
	                              <button type="submit" class="btn btn-block">Sửa
	                                  <span class="glyphicon glyphicon-ok"></span></button>
	                               <input type="hidden" name="_token" value="{{csrf_token()}}">
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





@endsection


@section('script')
   /* kiểm tra điều kiện trong form */
	<script>
		$(document).ready(function(){
			$('.ValidatorFrom').bootstrapValidator({
				message: 'This value is not valid',
				feedbackIcons:{
					valid: 'glyphicon glyphicon-ok',
					invalid: 'glyphicon glyphicon-remove',
					validating: 'glyphicon glyphicon-refresh'
				},
				fields: {
					Ten:{
						message: 'Bạn chưa nhập tên',
						validators:{
							notEmpty: {
								message: 'Vui lòng cung cấp tên'
							},
							stringLength:{
								min: 3,
								max: 30,
								message: 'Tên phải có độ dài từ 3 đến 30 ký tự'
							}
						}
					},
					LinkHinh:{
						validators:{
							notEmpty: {
								message: 'Vui lòng cung cấp địa chỉ'
							},
							uri:{
								allowLocal: true,
								message: 'Không đúng định dạng URL'
							}
						}
					}

				}
			});
		});

	</script>


	
	<script>
		var has_errors = {{$errors->count() > 0 ? 'true':'false'}};
		if(has_errors){
			swal({
			  type: 'error',
			  title: 'Lỗi',
			  html: jQuery("#ERROR_COPY").html(),
			  showCloseButton:true,
			 
			}).then(function(){
				window.location.reload(window.location.href);
				});
			
		

		}

		var success = {{session('thongbao') ? 'true':'false'}};
		if(success){
			swal({
			  type: 'success',
			  title: 'Thành công',
			  html: jQuery("#SUCCESS").html(),
			  showCloseButton:true,
			 
			}).then(function(){
				window.location.reload(window.location.href);
				});
			
		}



	
	</script>



	<script>
	  $(document).on('click', '#btnXoa', function (e) {
		    e.preventDefault();
		    var id = $(this).data('id');
			Swal({
			  title: 'Bạn đã chắc?',
			  text: 'Bạn sẽ không thể khôi phục lại dữ liệu!',
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonText: 'Ok, Xóa!',
			  cancelButtonText: 'Không, giữ lại'
			}).then((result) => {
				  if (result.value) {		
					window.location.href = "admin/loaimon/xoa/" + id;            		
				  } else if (result.dismiss === Swal.DismissReason.cancel) {
				    Swal(
				      'Hủy',
				      'Dữ liệu đã an toàn :)',
				      'error'
				    )
				  }
			});

		});


	</script>



	<script>
	  $(document).on('click', '#btnSua', function (e) {
		    e.preventDefault();
		    var id = $(this).data('id');
		   /*      alert(id); */
		    $.get("admin/loaimon/sua/"+id,function(data){
		    	 /*    alert(id);*/
		    	/*     console.log(data);  */
					
					$('#updateFrom').attr("action","admin/loaimon/sua/"+id);

			/* 		alert($("#updateFrom").attr("action")); */

					$('#updateFrom').find('#Ten').val(data.TENLOAI);
					$('#updateFrom').find('#LinkHinh').val(data.HINH);


		    		$('#myModalSua').modal('show');
		    	});

		});




	</script>	

@endsection        
