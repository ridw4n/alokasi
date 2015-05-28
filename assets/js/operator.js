$(document).ready(function() {
	$("#form-profil").validate({
		ignore: [],
		errorClass: "myErrorClass",
		rules:{
			nama:{
				required:true
			},
			email:{
				email:true
			}
		},
		errorPlacement: function (error, element) {
            //error.appendTo( element.parent("div"));
            error.insertAfter(element);
        },
        highlight: function (element, validClass) {
            $(element).parent().addClass('has-error');
        },
        unhighlight: function (element, validClass) {
            $(element).parent().removeClass('has-error');
        },
  		submitHandler: function(form) {
  			$.ajax({
				url:base_url+'operator/update',
				dataType:'json',
				type:'post',
				cache:false,
				data:$("#form-profil").serialize(),
				beforeSend:function(){
					$('#btn-update').prop('disabled', true);
					$('#btn-update').val("Menyimpan");
				},
				success:function(json){	
					if(json.success){
						swal({   
							title: "Sukses",   
							text: json.msg,   
							type: "success",
							closeOnConfirm:false
						}, 
						function(){  
							//location.reload();
							location.href=base_url+"operator/profil";
						});
					}else{
						swal("Ooops..", json.msg, "warning");
						$('#btn-update').prop('disabled', false);
						$('#btn-update').val("Update Profil");
					}
				}
			});
    		return false;
  		}
	});

	$("#form-tambah").validate({
		ignore: [],
		errorClass: "myErrorClass",
		rules:{
			username:{
				required:true,
				remote: {
	            url: base_url+"operator/check_username",
	            type: "post",
	            data:{
						username: function() {
				            return $( "#username" ).val();
				        }
					}
	       		}
			},
			hakakses:{
				required:true
			},
			nama:{
				required:true
			},
			email:{
				email:true
			},
			pwd:{
				required:true
			}
		},
		messages:{
			username:{
				remote: jQuery.validator.format("\"{0}\" is already taken.")
			}            
		},
		errorPlacement: function (error, element) {
            //error.appendTo( element.parent("div"));
            error.insertAfter(element);
        },
        highlight: function (element, validClass) {
            $(element).parent().addClass('has-error');
        },
        unhighlight: function (element, validClass) {
            $(element).parent().removeClass('has-error');
        },
  		submitHandler: function(form) {
  			$.ajax({
				url:base_url+'operator/act_tambah',
				dataType:'json',
				type:'post',
				cache:false,
				data:$("#form-tambah").serialize(),
				beforeSend:function(){
					$('#btn-tambah').prop('disabled', true);
					$('#btn-tambah').val("Menyimpan");
				},
				success:function(json){	
					if(json.success){
						swal({   
							title: "Sukses",   
							text: json.msg,   
							type: "success",
							closeOnConfirm:false
						}, 
						function(){  
							//location.reload();
							location.href=base_url+"operator/listop";
						});
					}else{
						swal("Ooops..", json.msg, "warning");
						$('#btn-tambah').prop('disabled', false);
						$('#btn-tambah').val("Tambah Operator");
					}
				}
			});
    		return false;
  		}
	});

	$("#form-edit").validate({
		ignore: [],
		errorClass: "myErrorClass",
		rules:{
			hakakses:{
				required:true
			},
			nama:{
				required:true
			},
			email:{
				email:true
			}
		},
		errorPlacement: function (error, element) {
            //error.appendTo( element.parent("div"));
            error.insertAfter(element);
        },
        highlight: function (element, validClass) {
            $(element).parent().addClass('has-error');
        },
        unhighlight: function (element, validClass) {
            $(element).parent().removeClass('has-error');
        },
  		submitHandler: function(form) {
  			$.ajax({
				url:base_url+'operator/update',
				dataType:'json',
				type:'post',
				cache:false,
				data:$("#form-edit").serialize(),
				beforeSend:function(){
					$('#btn-update').prop('disabled', true);
					$('#btn-update').val("Menyimpan");
				},
				success:function(json){	
					if(json.success){
						swal({   
							title: "Sukses",   
							text: json.msg,   
							type: "success",
							closeOnConfirm:false
						}, 
						function(){  
							//location.reload();
							location.href=base_url+"operator/listop";
						});
					}else{
						swal("Ooops..", json.msg, "warning");
						$('#btn-update').prop('disabled', false);
						$('#btn-update').val("Simpan Perubahan");
					}
				}
			});
    		return false;
  		}
	});

	$('#tb_listoperator').DataTable({
        "ajax": {
            "url": base_url+"operator/list_operator",
            "type": "POST"
        },
        "deferRender": true,
        "processing":true,
        "language": {
            "sProcessing":   "Sedang memproses...",
			"sLengthMenu":   "Tampilkan _MENU_ entri",
			"sZeroRecords":  "Tidak ditemukan data yang sesuai",
			"sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
			"sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
			"sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
			"sInfoPostFix":  "",
			"sSearch":       "Cari:",
			"sUrl":          "",
			"oPaginate": {
				"sFirst":    "Pertama",
				"sPrevious": "Sebelumnya",
				"sNext":     "Selanjutnya",
				"sLast":     "Terakhir"
			}
        }
	});
});

function hapus_operator(id){
	swal({
		title: "Konfirmasi?",
		text: "Hapus Akun Ini",
		type: "warning",
		showCancelButton: true,
		confirmButtonClass: "btn-danger",
		confirmButtonText: "Ya, Hapus!",
		closeOnConfirm: false
	},
	function(){
		$.ajax({
			url:base_url+'operator/hapus',
			dataType:'json',
			type:'post',
			cache:false,
			data:"idop="+id,
			success:function(json){
				if(json.success){
					swal({   
						title: "Sukses",   
						text: json.msg,   
						type: "success",
						closeOnConfirm:false
					}, 
					function(){  
						location.reload();
						/*var table = $('#tb_listoperator').DataTable();
						table.clear();
						table.draw();
						table.ajax.reload();*/
					});
				}
			}
		});
	});
}