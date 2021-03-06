$(document).ready(function() {
	$("#mk-filter").validate({
		ignore: [],
		errorClass: "myErrorClass",
		rules:{
			prodi:{
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
				url:base_url+'matakuliah/opsi',
				dataType:'json',
				type:'post',
				cache:false,
				data:$("#mk-filter").serialize(),
				beforeSend:function(){
				},
				success:function(json){	
					if(json.success){
						location.href=base_url+"matakuliah/daftar_mk";
					}
				}
			});
    		return false;
  		}
	});

	$("#uploadmk").validate({
		ignore: [],
		errorClass: "myErrorClass",
		rules:{
			prodi:{
				required:true
			},
			berkas:{
				required:true
			}
		},
		messages:{
			prodi:{
				required:"Pilih Program Studi Terlebih Dahulu"
			},
			berkas:{
				required:"Pilih File Excel yang ingin diupload"
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
	  		if(window.FormData !== undefined){  // for HTML5 browsers	
	  			var formData = new FormData(document.getElementById("uploadmk"));
	  			$.ajax({
					url:base_url+'matakuliah/act_upload',
					type:'POST',
					data:formData,
					dataType:'html',
					mimeType:'multipart/form-data',
					contentType: false,
			    	cache: false,
					processData:false,
					beforeSend:function(){
					},
					success:function(html){	
						/*if(json.success){
							location.href=base_url+"matakuliah/daftar_mk";
						}*/
						$("#tabelpreviewupload").show();
						$("#tbpreview").html(html);
						$("#btntblaction").show();
						$("#btn-tampilkan").prop('disable', true);
					}
				});
			}else{  //for olden browsers
				
				var  iframeId = "unique" + (new Date().getTime());
				var iframe = $('<iframe src="javascript:false;" name="'+iframeId+'" />');
				iframe.hide();
				form.attr("target",iframeId);
				iframe.appendTo("body");
				iframe.load(function(e){
					var doc = getDoc(iframe[0]);
					var docRoot = doc.body ? doc.body : doc.documentElement;
					var data = docRoot.innerHTML;
				});
			}
    		//return false;
  		}
	});

	$("#tambahmk").validate({
		ignore: [],
		errorClass: "myErrorClass",
		rules:{
			kodemk:{
				required:true
			},
			namamk:{
				required:true
			},
			sksmk:{
				required:true,
				digits:true
			},
			smtmk:{
				required:true,
				digits:true
			},
			thn_ajaran:{
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
				url:base_url+'matakuliah/act_tambah',
				dataType:'json',
				type:'post',
				cache:false,
				data:$("#tambahmk").serialize(),
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
							location.href=base_url+"matakuliah/daftar_mk";
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

	$("#editmk").validate({
		ignore: [],
		errorClass: "myErrorClass",
		rules:{
			kodemk:{
				required:true
			},
			namamk:{
				required:true
			},
			sksmk:{
				required:true,
				digits:true
			},
			smtmk:{
				required:true,
				digits:true
			},
			thn_ajaran:{
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
				url:base_url+'matakuliah/update',
				dataType:'json',
				type:'post',
				cache:false,
				data:$("#editmk").serialize(),
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
							location.href=base_url+"matakuliah/daftar_mk";
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

	$('#tbdaftarmk').DataTable({
        "ajax": {
            "url": base_url+"matakuliah/list_mk",
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

	$("#simpandata").click(function() {
		$.ajax({
			url:base_url+'matakuliah/act_simpantabel',
			dataType:'json',
			type:'post',
			cache:false,
			beforeSend:function(){
			},
			success:function(json){	
				if(json.success){
					location.href=base_url+"matakuliah/opsi";
				}
			}
		});
		return false;
	});

	$("#reset").click(function() {
		$.ajax({
			url:base_url+'matakuliah/resetform',
			dataType:'json',
			type:'post',
			cache:false,
			beforeSend:function(){
			},
			success:function(json){	
				if(json.success){
					location.reload();
				}
			}
		});
		return false;
	});
});

function hapus_mk(id){
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
			url:base_url+'matakuliah/hapus',
			dataType:'json',
			type:'post',
			cache:false,
			data:"idmk="+id,
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