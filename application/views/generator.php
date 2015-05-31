<div class="row">
	<div class="col-md-12">
		<h3 class="page-header">Generator Ruangan</h3>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<form class="form-horizontal" id="form_gen" name="form_gen" action="" method="post">
			<div class="form-group">
				<label class="control-label col-md-3">Prodi</label>
				<div class="col-md-4">
					<?php
					$optprodi=array(""=>"Pilih Prodi");
					if($prodi!=FALSE){
						foreach($prodi as $ta){
							$optprodi[$ta['id_prodi']]=$ta['nama_prodi'];
						}
					}
					$js='id="prodi" class="form-control" onChange="get_jlh(this.value)"';
					echo form_dropdown('prodi', $optprodi, '', $js);
					?>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3"></label>
				<div class="col-md-7">
					<span id="pesangen"></span>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3"></label>
				<div class="col-md-4">
					<input type="submit" class="btn btn-primary" value="Jalankan Generator" id="btn-gen" name="btn-gen" />
				</div>
			</div>
		</form>
	</div>
</div>