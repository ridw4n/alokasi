$(document).ready(function() {
	$("#form_gen").validate({
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
				url:base_url+'jadwal_gen/prodi',
				dataType:'json',
				type:'post',
				cache:false,
				data:$("#form_gen").serialize(),
				beforeSend:function(){
				},
				success:function(json){	
					if(json.success){
						swal({   
							title: "Sukses",   
							text: "Proses Selesai.",   
							type: "success",
							closeOnConfirm:false
						}, 
						function(){  
							location.href=base_url+"jadwal/opsi_elektro";
							//location.reload();
						});
					}
				}
			});
    		return false;
  		}
	});
});

function get_jlh(idprodi){
	//alert(idprodi);
	$.ajax({
		url:base_url+'jadwal_gen/check_jlh_jadwal',
		dataType:'json',
		type:'post',
		cache:false,
		data:"idprodi="+idprodi,
		beforeSend:function(){
		},
		success:function(json){	
			if(json.success){
				$("#pesangen").html(json.msg);
				if(json.jlh==0){
					$('#btn-gen').prop('disabled', true);
				}else{
					$('#btn-gen').prop('disabled', false);
				}
			}
		}
	});

}