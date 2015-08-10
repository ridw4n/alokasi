$(document).ready(function() {
	$("#filter_elektro").validate({
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
				url:base_url+'jadwal/opsi_elektro',
				dataType:'json',
				type:'post',
				cache:false,
				data:$("#filter_elektro").serialize(),
				beforeSend:function(){
				},
				success:function(json){	
					if(json.success){
						location.href=base_url+"jadwal/jadwal_elektro";
					}
				}
			});
    		return false;
  		}
	});

	$("#filter_sipil").validate({
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
				url:base_url+'jadwal/opsi_sipil',
				dataType:'json',
				type:'post',
				cache:false,
				data:$("#filter_sipil").serialize(),
				beforeSend:function(){
				},
				success:function(json){	
					if(json.success){
						location.href=base_url+"jadwal/jadwal_sipil";
					}
				}
			});
    		return false;
  		}
	});

	$('#jadwalelektro').DataTable({
        "ajax": {
            "url": base_url+"jadwal/list_jadwaleketro",
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

	$('#jadwalsipil').DataTable({
        "ajax": {
            "url": base_url+"jadwal/list_jadwalsipil",
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

	$("#tambahjadwal_elektro").validate({
		ignore: [],
		errorClass: "myErrorClass",
		rules:{
			hari:{
				required:true
			},
			wkt_mulai:{
				required:true
			},
			wkt_selesai:{
				required:true
			},
			idmk:{
				required:true
			},
			kelas:{
				required:true
			},
			dosen_pengajar:{
				required:true
			},
			jlh_mhs:{
				required:true,
				digits:true
			},
			kode_smt:{
				required:true
			},
			tahun_ajaran:{
				required:true
			},
			prioritas:{
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
				url:base_url+'jadwal/act_tambah',
				dataType:'json',
				type:'post',
				cache:false,
				data:$("#tambahjadwal_elektro").serialize(),
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
							location.href=base_url+"jadwal/jadwal_elektro";
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

	$("#editjadwal_elektro").validate({
		ignore: [],
		errorClass: "myErrorClass",
		rules:{
			hari:{
				required:true
			},
			wkt_mulai:{
				required:true
			},
			wkt_selesai:{
				required:true
			},
			idmk:{
				required:true
			},
			kelas:{
				required:true
			},
			dosen_pengajar:{
				required:true
			},
			jlh_mhs:{
				required:true,
				digits:true
			},
			kode_smt:{
				required:true
			},
			tahun_ajaran:{
				required:true
			},
			prioritas:{
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
				url:base_url+'jadwal/update',
				dataType:'json',
				type:'post',
				cache:false,
				data:$("#editjadwal_elektro").serialize(),
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
							location.href=base_url+"jadwal/jadwal_elektro";
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

	$("#tambahjadwal_sipil").validate({
		ignore: [],
		errorClass: "myErrorClass",
		rules:{
			hari:{
				required:true
			},
			wkt_mulai:{
				required:true
			},
			wkt_selesai:{
				required:true
			},
			idmk:{
				required:true
			},
			kelas:{
				required:true
			},
			dosen_pengajar:{
				required:true
			},
			jlh_mhs:{
				required:true,
				digits:true
			},
			kode_smt:{
				required:true
			},
			tahun_ajaran:{
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
				url:base_url+'jadwal/act_tambah',
				dataType:'json',
				type:'post',
				cache:false,
				data:$("#tambahjadwal_sipil").serialize(),
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
							location.href=base_url+"jadwal/jadwal_sipil";
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

	$("#editjadwal_sipil").validate({
		ignore: [],
		errorClass: "myErrorClass",
		rules:{
			hari:{
				required:true
			},
			wkt_mulai:{
				required:true
			},
			wkt_selesai:{
				required:true
			},
			idmk:{
				required:true
			},
			kelas:{
				required:true
			},
			dosen_pengajar:{
				required:true
			},
			jlh_mhs:{
				required:true,
				digits:true
			},
			kode_smt:{
				required:true
			},
			tahun_ajaran:{
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
				url:base_url+'jadwal/update',
				dataType:'json',
				type:'post',
				cache:false,
				data:$("#editjadwal_sipil").serialize(),
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
							location.href=base_url+"jadwal/jadwal_sipil";
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

	/*$('#tanggal').datetimepicker({
        format: "yyyy-mm-dd",
        language:  'id',
        weekStart: 1,
        todayBtn:  true,
		autoclose: true,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });*/

    $('.timepicker').datetimepicker({
    	format: "hh:ii:00",
        language:  'id',
        weekStart: 1,
        todayBtn:  true,
		autoclose: true,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });

    $("#uploadjadwal").validate({
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
	  			var formData = new FormData(document.getElementById("uploadjadwal"));
	  			$.ajax({
					url:base_url+'jadwal/act_upload',
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

	$("#simpandata").click(function() {
		$.ajax({
			url:base_url+'jadwal/act_simpantabel',
			dataType:'json',
			type:'post',
			cache:false,
			beforeSend:function(){
			},
			success:function(json){	
				if(json.success){
					//location.href=base_url+"jadwal/opsi";
					location.reload();
				}
			}
		});
		return false;
	});

	$("#reset").click(function() {
		$.ajax({
			url:base_url+'jadwal/resetform',
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

function hapus_jadwal_e(id){
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
			url:base_url+'jadwal/hapus',
			dataType:'json',
			type:'post',
			cache:false,
			data:"idjadwal="+id+"&jur=elektro",
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

function hapus_jadwal_s(id){
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
			url:base_url+'jadwal/hapus',
			dataType:'json',
			type:'post',
			cache:false,
			data:"idjadwal="+id+"&jur=sipil",
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