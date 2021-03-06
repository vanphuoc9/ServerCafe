@extends('admin.layout.index')

@section('content')
	
	<div id="content">
			<div class="container-fluid">
				
				
				<div class="row">
					<div class="col-lg-12">
						<div class="page-header">
							<h1>Danh sách món</h1> 
							<button class="btn btn-primary btn-them" id="btnThem">Thêm món</button>
							
						</div>
						<input class="form-control" id="myInput" onkeyup="myFunction()" type="text" placeholder="Tìm theo tên...">
					</div>
				</div>
				<!-- table -->
				<div class="row">
					<div class="col-lg-12">
						<table class="table table-striped table-bordered table-hover" id="myTable">
						  <thead>
						      <tr>
						        <th>Tên</th>
						        <th>Hình</th>
						        <th>Mô tả</th>
						        <th>Đơn giá</th>
						        <th>Xóa</th>
						        <th>Sửa</th>
						      </tr>
						   </thead>
						   <tbody>
						   	@foreach($mon as $m)
						      <tr class="odd gradeX" align="center">
						        <td>{{$m->TEN}}</td>
                                <td><img src="{{$m->HINH}}" width="100px" height="100px"></td>
                                <td>{{$m->MOTA}}</td>
                                <td>{{$m->DONGIA}} VND</td>
                         		<td class="center"><i class="glyphicon glyphicon-remove"></i><a href="" data-id="{{$m->MAMON}}" id="btnXoa">Xóa</a></td>
                                <td class="center"><i class="glyphicon glyphicon-pencil"></i> <a href="" data-id="{{$m->MAMON}}" id="btnSua">Sửa</a></td>
   
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
                 <div class="alert alert-danger" id="ERROR_COPY">
                 
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
	                           <form class="ValidatorFrom" action="admin/mon/them" role="form" data-toggle="validator" method="POST" id="insertForm">
	                              <div class="form-group">
	                                 <label for="Ten"><span class="glyphicon glyphicon-user"></span> Tên món</label>
	                                 <input type="text" class="form-control" placeholder="Tên món..." name="Ten">
	                              </div>
	                              <div class="form-group">
	                                 <label for="LinkHinh"><span class="glyphicon glyphicon-phone"></span> Link hình</label>
	                                 <input type="text" class="form-control" placeholder="Link hình..." name="LinkHinh">
	                              </div>
	                              <div class="form-group">
	                                <label>Mô tả</label>
	                                <textarea id="MoTa" name="MoTa" class="form-control"  rows="5" ></textarea>
	                            </div>
	                             <div class="form-group">
	                                 <label for="Ten"><span class="glyphicon glyphicon-user"></span>Đơn giá</label>
	                                 <input type="number" class="form-control" placeholder="Đơn giá" name="DonGia">
	                              </div>
	                              <div class="form-group">
	                                <label>Loại món ăn</label>
	                                <select class="form-control" name="LoaiMonAn" required id="selectMon">
	                                
	                                </select>
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
	                              <div class="form-group">
	                                <label>Mô tả</label>
	                                <textarea id="MoTa" name="MoTa" class="form-control"  rows="5" ></textarea>
	                              </div>
	                               <div class="form-group">
	                                 <label for="Ten"><span class="glyphicon glyphicon-user"></span>Đơn giá</label>
	                                 <input type="number" class="form-control" placeholder="Đơn giá" name="DonGia" id="DonGia">
	                              </div>
	                              <div class="form-group">
	                                <label>Loại món ăn</label>
	                                <select class="form-control" name="LoaiMonAn" required id="selectMonSua">
	                                
	                                </select>
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
					},
					MoTa:{
						message: 'Bạn chưa nhập mô tả',
						validators:{
							notEmpty: {
								message: 'Vui lòng cung cấp mô tả'
							},
							stringLength:{
								min: 3,
								max: 30,
								message: 'Mô tả phải có độ dài từ 3 đến 30 ký tự'
							}
						}
					},
					DonGia:{
						message: 'Bạn chưa nhập đơn giá',
						validators:{
							notEmpty: {
								message: 'Vui lòng cung cấp đơn giá'
							},
							stringLength:{
								min: 4,
								max: 30,
								message: 'Đơn giá phải có độ dài từ 4 đến 30 ký tự'
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
	  $(document).on('click', '#btnThem', function (e) {
		    e.preventDefault();
		   /*      alert(id); */
		    $.get("admin/mon/them",function(data){
		    	 /*    alert(id);*/
		    	 select = document.getElementById('selectMon');
		    	 $('#selectMon').html('');
		    	     // console.log(data);  
				for (var i in data){
					// console.log(data[i].MALOAI);
					// console.log(data[i].TENLOAI);
					var opt = document.createElement('option');
					opt.value = data[i].MALOAI;
					opt.innerHTML = data[i].TENLOAI;
					select.append(opt);
					$('#myModalThem').modal('show');
					
				}
		    });

		});




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
					window.location.href = "admin/mon/xoa/" + id;            		
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
		    $.get("admin/mon/sua/"+id,function(data){
		    	 /*    alert(id);*/
		    	     // console.log(data);  
					
					$('#updateFrom').attr("action","admin/mon/sua/"+id);
					$('#updateFrom').find('#Ten').val(data.TEN);
					$('#updateFrom').find('#LinkHinh').val(data.HINH);
					$('#updateFrom').find('#MoTa').val(data.MOTA);
					$('#updateFrom').find('#DonGia').val(data.DONGIA);

					 $.get("admin/mon/them",function(datasua){
				    	     // alert(data.MALOAI);
				    	 select = document.getElementById('selectMonSua');
				    	 $('#selectMonSua').html('');
				    	     // console.log(data);  
						for (var i in datasua){
							// console.log(data[i].MALOAI);
							// console.log(data[i].TENLOAI);
							var opt = document.createElement('option');
							// selected
							if (data.MALOAI == datasua[i].MALOAI) {
								opt.selected = datasua[i].MALOAI;
							}
							opt.value = datasua[i].MALOAI;
							opt.innerHTML = datasua[i].TENLOAI;
							select.append(opt);		
						}
				    });

		    		$('#myModalSua').modal('show');
		    	});

		});




	</script>		


	


@endsection        
