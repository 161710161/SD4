@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Lihat Staf 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">

			  		<div class="form-group">
			  			<label class="control-label">Nama Staf</label>
						<input type="text" name="title" class="form-control" value="{{ $staf->nama_staf }}"  readonly>
			  		</div>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">Jabatan</label>
						<input type="text" name="title" class="form-control" value="{{ $staf->jabatan }}"  readonly>
			  		</div>

        			<div class="form-group">
			  			<label class="control-label">Kurikulum</label>	
			  			<input type="text" name="title" class="form-control" value="{{ $staf->kurikulum->nama_kurikulum }}"  readonly>
			  		</div>

			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection