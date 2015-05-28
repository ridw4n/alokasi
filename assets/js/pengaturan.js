$(document).ready(function() {
	$("#form-pengaturan").validate({
		ignore: [],
		errorClass: "myErrorClass",
		rules:{
			smtaktif:{
				required:true
			},
			thnajaranaktif:{
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
				url:base_url+'pengaturan/update',
				dataType:'json',
				type:'post',
				cache:false,
				data:$("#form-pengaturan").serialize(),
				beforeSend:function(){
					$('#btn-simpan').prop('disabled', true);
					$('#btn-simpan').val("Menyimpan");
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
							location.href=base_url+"pengaturan";
						});
					}else{
						swal("Ooops..", json.msg, "warning");
						$('#btn-simpan').prop('disabled', false);
						$('#btn-simpan').val("Simpan");
					}
				}
			});
    		return false;
  		}
	});
});