$(document).ready(function() {
	$("#form-login").validate({
		ignore: [],
		errorClass: "myErrorClass",
		rules:{
			username:{
				required:true
			},
			password:{
				required:true
			}
		},
		messages:{
			username:{
				required:"Silakan Inputkan Username Anda"
			},
			password:{
				required:"Silakan Inputkan Password Anda"
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
				url:base_url+'operator/check_login',
				dataType:'json',
				type:'post',
				cache:false,
				data:$("#form-login").serialize(),
				beforeSend:function(){
					$('#btn-login').prop('disabled', true);
					$('#btn-login').val("Sedang Memproses");
				},
				success:function(json){	
					if(json.success){
						/*swal({   
							title: "Sukses",   
							text: json.msg,   
							type: "success",
							closeOnConfirm:false
						}, 
						function(){  */
							//location.reload();
							location.href=base_url;
						//});
					}else{
						swal("Ooops..", json.msg, "warning");
						$('#btn-login').prop('disabled', false);
						$('#btn-login').val("Login");
					}
				}
			});
    		return false;
  		}
	});
});