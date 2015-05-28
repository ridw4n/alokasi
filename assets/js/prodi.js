$(document).ready(function() {
	$("#tambahprodi").validate({
		ignore: [],
		errorClass: "myErrorClass",
		rules:{
			nmprodi:{
				required:true
			},
			jurusan:{
				required:true
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
				url:base_url+'prodi/act_tambah',
				dataType:'json',
				type:'post',
				cache:false,
				data:$("#tambahprodi").serialize(),
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
							location.href=base_url+"prodi";
						});
					}else{
						swal("Ooops..", json.msg, "warning");
						$('#btn-tambah').prop('disabled', false);
						$('#btn-tambah').val("Tambah Data");
					}
				}
			});
    		return false;
  		}
	});

	$("#editprodi").validate({
		ignore: [],
		errorClass: "myErrorClass",
		rules:{
			nmprodi:{
				required:true
			},
			jurusan:{
				required:true
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
				url:base_url+'prodi/update',
				dataType:'json',
				type:'post',
				cache:false,
				data:$("#editprodi").serialize(),
				beforeSend:function(){
					$('#btn-edit').prop('disabled', true);
					$('#btn-edit').val("Menyimpan");
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
							location.href=base_url+"prodi";
						});
					}else{
						swal("Ooops..", json.msg, "warning");
						$('#btn-edit').prop('disabled', false);
						$('#btn-edit').val("Update Data");
					}
				}
			});
    		return false;
  		}
	});

	$('#listprodi').DataTable({
        "ajax": {
            "url": base_url+"prodi/list_prodi",
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

function hapus_prodi(id){
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
			url:base_url+'prodi/hapus',
			dataType:'json',
			type:'post',
			cache:false,
			data:"idprodi="+id,
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