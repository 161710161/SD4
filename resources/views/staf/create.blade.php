@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Tambah Staf 
			  	<div class="panel-title pull-right"><a href="{{ route('staf.index') }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('staf.store') }}" method="post" >
			  		{{ csrf_field() }}
			  		
			  		<div class="form-group {{ $errors->has('nama_staf') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Staf</label>	
			  			<input type="text" name="nama_staf" class="form-control"  required>
			  			@if ($errors->has('nama_staf'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_staf') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{$errors->has('jabatan') ? 'has-error' : ''}}">
								<label class="control-label">Jabatan</label>
								<input type="text" name="jabatan" class="form-control" required>
								@if ($errors->has('jabatan'))
									<span class="help-blocks">
										<strong>{{$errors->first('jabatan')}}</strong>
									</span>
								@endif
							</div>

					<div class="form-group {{ $errors->has('kurikulum_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Kurikulum</label>	
			  			<select name="kurikulum_id" class="form-control">
			  				@foreach($kurikulum as $data)
			  				<option value="{{ $data->id }}">{{ $data->nama_kurikulum }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('kurikulum_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('kurikulum_id') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Tambah</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection