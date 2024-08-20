<div class="modal-body">
	<center>
		<img src="{!! asset('template') !!}/dist/img/err404.png" alt="404" style="width: 150px;">
		<h2><b class="text-gray">Data Not Found</b></h2>
		<div class="div-outline-danger">
			@if (!empty($info))
				<i class="text-danger">{{ $info }}</i>
			@else
				<i class="text-danger">Kami tidak dapat menemukan data yang anda cari!</i>
			@endif
		</div>
		<hr>
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Tutup</button>
	</center>
</div>