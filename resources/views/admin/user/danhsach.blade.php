@extends('admin.layout.index')

@section('content')
	
	<div id="content">
			<div class="container-fluid">
				
				
				<div class="row">
					<div class="col-lg-12">
						<div class="page-header">
							<h1>Danh sách người dùng</h1> 
							<button class="btn btn-primary btn-them" data-toggle="modal" data-target="#myModalThem">Thêm người dùng</button>
							
						</div>
						<input class="form-control" id="myInput" onkeyup="myFunction()" type="text" placeholder="Tìm theo tên...">
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						<table class="table table-striped table-bordered table-hover" id="myTable">
						  <thead>
						      <tr>
						        <th>Tên</th>
						        <th>Email</th>
						        <th>Địa chỉ</th>
						        <th>SĐT</th>
						        <th>Cấp độ</th>
						        <th>Xóa</th>
						        <th>Sửa</th>
						      </tr>
						   </thead>
						   <tbody>
						   	@foreach($user as $lm)
						      <tr class="odd gradeX" align="center">
						        <td>{{$lm->TEN}}</td>
                                <td>{{$lm->EMAIL}}</td>
                                <td>{{$lm->DIACHI}}</td>
                                <td>{{$lm->SODIENTHOAI}}</td>
                                <td>
                                    @if($lm->QUYEN == 1)
                                       {{"Admin"}}
                                    @else
                                        {{"Thường"}}
                                    @endif    

                                </td>
                         		<td class="center"><i class="glyphicon glyphicon-remove"></i><a href="" data-id="{{$lm->MAND}}" id="btnXoa">Xóa</a></td>
                                <td class="center"><i class="glyphicon glyphicon-pencil"></i> <a href="" data-id="{{$lm->MAND}}" id="btnSua">Sửa</a></td>
                       <!--          <td class="center"><i class="glyphicon glyphicon-pencil"></i> <a href="admin/loaimon/sua/{{$lm->MALOAI}}" data-toggle="modal" data-target="#myModalSua" id="btnSua">Sửa</a></td> -->
						      </tr >
						     @endforeach
						 
						   </tbody>
		  				</table>
		  			{!! $user->links()!!}
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
	                           <form class="ValidatorFrom" action="admin/user/them" role="form" data-toggle="validator" method="POST" >
	                              <div class="form-group">
	                                 <label for="TenDN"><span class="glyphicon glyphicon-user"></span> Tên đăng nhập</label>
	                                 <input type="text" class="form-control" placeholder="Tên đăng nhập..." name="Ten">
	                              </div>

	                               <div class="form-group">
		                                <label><span class="glyphicon glyphicon-lock"></span> Password</label>
		                                <input class="form-control" type="password" name="password" placeholder="Nhập mật khẩu" />
		                            </div>
		                             <div class="form-group">
		                                <label><span class="glyphicon glyphicon-lock"></span> Nhập lại Password</label>
		                                <input class="form-control" type="password" name="passwordAgain" placeholder="Nhập lại mật khẩu" />
		                            </div>

	                              <div class="form-group">
	                                 <label for="HoTen"><span class="glyphicon glyphicon-user"></span> Họ Tên</label>
	                                 <input type="text" class="form-control" placeholder="Họ Tên..." name="HoTen">
	                              </div>

	                              <div class="form-group">
	                                 <label for="Email"><span class="glyphicon glyphicon-envelope"></span> Email</label>
	                                 <input type="text" class="form-control" placeholder="Email..." name="Email">
	                              </div>
	                              <div class="form-group">
	                                 <label for="DiaChi"><span class="glyphicon glyphicon-home"></span> Địa chỉ</label>
	                                 <input type="text" class="form-control" placeholder="Địa chỉ..." name="DiaChi">
	                              </div>
	                              <div class="form-group">
	                                 <label for="SDT"><span class="glyphicon glyphicon-earphone"></span> SĐT</label>
	                                 <input type="text" class="form-control" placeholder="Số điện thoại..." name="SDT">
	                              </div>
	                                 <div class="form-group">
		                                <label>Quyền người dùng</label>
		                                <label class="radio-inline">
		                                    <input name="quyen" value="0" checked="" type="radio">Thường
		                                </label>
		                                <label class="radio-inline">
		                                    <input name="quyen" value="1" type="radio">Admin
		                                </label>
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
	                                 <label for="Ten"><span class="glyphicon glyphicon-user"></span> Tên đăng nhập</label>
	                                 <input type="text" class="form-control" placeholder="Tên loại món..." name="Ten" value="" id="Ten" disabled="">
	                              </div>
	                              

	                               <div class="form-group">
	                               		<input type="checkbox" name="changePassword" id="changePassword">
		                                <label><span class="glyphicon glyphicon-lock"></span> Password</label>
		                                <input class="form-control password" type="password" name="password" id="password" placeholder="Nhập mật khẩu" disabled="" />
		                            </div>
		                             <div class="form-group">
		                                <label><span class="glyphicon glyphicon-lock"></span> Nhập lại Password</label>
		                                <input class="form-control password" type="password" name="passwordAgain" id="passwordAgain" placeholder="Nhập lại mật khẩu" disabled="" />
		                            </div>

	                              <div class="form-group">
	                                 <label for="HoTen"><span class="glyphicon glyphicon-user"></span> Họ Tên</label>
	                                 <input type="text" class="form-control" placeholder="Họ Tên..." name="HoTen" id="HoTen">
	                              </div>

	                              <div class="form-group">
	                                 <label for="Email"><span class="glyphicon glyphicon-envelope"></span> Email</label>
	                                 <input type="text" class="form-control" placeholder="Email..." name="Email" id="Email">
	                              </div>
	                              <div class="form-group">
	                                 <label for="DiaChi"><span class="glyphicon glyphicon-home"></span> Địa chỉ</label>
	                                 <input type="text" class="form-control" placeholder="Địa chỉ..." name="DiaChi" id="DiaChi">
	                              </div>
	                              <div class="form-group">
	                                 <label for="SDT"><span class="glyphicon glyphicon-earphone"></span> SĐT</label>
	                                 <input type="text" class="form-control" placeholder="Số điện thoại..." name="SDT" id="SDT">
	                              </div>
	                                 <div class="form-group">
		                                <label>Quyền người dùng</label>
		                                <label class="radio-inline">
		                                    <input name="quyen" value="0" checked="" type="radio" id="quyenuser">Thường
		                                </label>
		                                <label class="radio-inline">
		                                    <input name="quyen" value="1" type="radio" id="quyenadmin">Admin
		                                </label>
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

			</div> <!-- container-fluid -->
	</div>	<!-- content -->





@endsection


@section('script')
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
					HoTen:{
						message: 'Bạn chưa nhập họ và tên',
						validators:{
							notEmpty:{
								message: 'Vui lòng cung cấp họ và tên'
							},
							stringLength:{
								min: 3,
								max: 30,
								message: 'Họ tên phải có độ dài từ 3 đến 30 ký tự'
							}
						}
					},
					Email:{
						message: 'Bạn chưa nhập email',
						validators:{
							notEmpty:{
								message: 'Vui lòng cung cấp email'
							},
							emailAddress: {
		                        message: 'Vui lòng cung câp đúng địa chỉ email'
		                    }
						}
					},
					SDT:{
						message: 'Bạn chưa nhập số điện thoại',
						validators:{
							notEmpty:{
								message: 'Vui lòng cung cấp số điện thoại'
							},
							phone: {
		                        country: 'US',
		                        message: 'Vui lòng cung cấp đúng định dạng số điện thoại'
		                    }
						}
					},
					DiaChi:{
						message: 'Bạn chưa nhập địa chỉ',
						validators:{
							notEmpty:{
								message: 'Vui lòng cung cấp địa chỉ'
							},
							stringLength:{
								min: 3,
								max: 100,
								message: 'Địa chỉ phải có độ dài từ 3 đến 100 ký tự'
							}
						}
					},
					password:{
						message: 'Bạn chưa nhập nhập mật khẩu',
						validators:{
							notEmpty:{
								message: 'Vui lòng cung cấp mật khẩu'
							},
							stringLength:{
								min: 3,
								max: 100,
								message: 'Mật khẩu phải có độ dài từ 3 đến 100 ký tự'
							},
							 identical: {
		                        field: 'passwordAgain',
		                        message: 'Mật khẩu và mật khẩu nhập lại không giống nhau.'
		                    }
						}
					},
					passwordAgain:{
						message: 'Bạn chưa nhập mật khẩu',
						validators:{
							notEmpty:{
								message: 'Vui lòng cung cấp mật khẩu'
							},
							stringLength:{
								min: 3,
								max: 100,
								message: 'Mật khẩu phải có độ dài từ 3 đến 100 ký tự'
							},
							 identical: {
		                        field: 'password',
		                        message: 'Mật khẩu và mật khẩu nhập lại không giống nhau.'
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
					window.location.href = "admin/user/xoa/" + id;            		
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
		    $.get("admin/user/sua/"+id,function(data){
		    	 /*    alert(id);*/
		    	/*     console.log(data);  */
					
					$('#updateFrom').attr("action","admin/user/sua/"+id);

			/* 		alert($("#updateFrom").attr("action")); */

					$('#updateFrom').find('#Ten').val(data.TENDANGNHAP);
					$('#updateFrom').find('#HoTen').val(data.TEN);
					$('#updateFrom').find('#Email').val(data.EMAIL);
					$('#updateFrom').find('#DiaChi').val(data.DIACHI);
					$('#updateFrom').find('#SDT').val(data.SODIENTHOAI);
					// $('#updateFrom').find('#Ten').val(data.QUYEN);
					// $('#updateFrom').find('#LinkHinh').val(data.HINH);
					if(data.QUYEN == 1){
						$('#updateFrom').find('#quyenadmin').prop("checked", true);
					}else{
						$('#updateFrom').find('#quyenuser').prop("checked", true);
					}



		    		$('#myModalSua').modal('show');
		    	});

		});




	</script>
	<script>
      $(document).ready(function(){
          $("#changePassword").change(function(){
             if($(this).is(":checked")){
                $(".password").removeAttr('disabled'); // class password remove thuộc tính disabled


             }else{
                // không check thêm thuộc tính disabled
                $(".password").attr('disabled','');

             }
          });
      });
  </script>	

@endsection        
