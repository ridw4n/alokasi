$(document).ready(function() {
	$("#form-tambah").validate({
		ignore: [],
		errorClass: "myErrorClass",
		rules:{
			nama_ruangan:{
				required:true
			},
			prodi:{
				required:true
			},
			kapasitas:{
				required:true,
				digits:true,
				maxlength:4
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
				url:base_url+'ruangan/act_tambah',
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
							location.href=base_url+"ruangan";
						});
					}else{
						swal("Ooops..", json.msg, "warning");
						$('#btn-tambah').prop('disabled', false);
						$('#btn-tambah').val("Tambah Ruangan");
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
			nama_ruangan:{
				required:true
			},
			kapasitas:{
				required:true,
				digits:true,
				maxlength:4
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
				url:base_url+'ruangan/update',
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
							location.href=base_url+"ruangan";
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

	$('#tb_listruangan').DataTable({
        "ajax": {
            "url": base_url+"ruangan/list_ruangan",
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

function hapus_ruangan(id){
	swal({
		title: "Konfirmasi?",
		text: "Hapus Data Ini",
		type: "warning",
		showCancelButton: true,
		confirmButtonClass: "btn-danger",
		confirmButtonText: "Ya, Hapus!",
		closeOnConfirm: false
	},
	function(){
		$.ajax({
			url:base_url+'ruangan/hapus',
			dataType:'json',
			type:'post',
			cache:false,
			data:"idruangan="+id,
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
					});
				}
			}
		});
	});
}