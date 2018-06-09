@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Edit Guru 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('guru.update',$guru->id) }}" method="post" enctype="multipart/form-data">
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		
			  		<div class="form-group {{ $errors->has('nama_guru') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Guru</label>	
			  			<input type="text" value="{{ $guru->nama_guru }}" name="nama_guru" class="form-control"  required>
			  			@if ($errors->has('nama_guru'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_guru') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{$errors->has('jabatan') ? 'has-error' : ''}}">
								<label class="control-label">Jabatan</label>
								<input type="text" name="jabatan" class="form-control" value="{{$guru->jabatan}}" required>
								@if ($errors->has('jabatan'))
									<span class="help-blocks">
										<strong>{{$errors->first('jabatan')}}</strong>
									</span>
								@endif
							</div>

						<div class="form-group {{ $errors->has('foto') ? ' has-error' : '' }}">
			  			<label class="control-label">Foto</label>
							<div class="row">
        					<div class="col s6">
            					<img src="{{ asset('img/'.$guru->foto) }}" name="foto" width="150" height="150" />
        					</div>
  							</div><br>
			  			<input type="file" name="foto" class="form-control" value="{{ $guru->foto }}">
			  			@if ($errors->has('foto'))
                            <span class="help-block">
                                <strong>{{ $errors->first('foto') }}</strong>
                            </span>
                        @endif
					  </div>
					  
					<div class="form-group {{ $errors->has('kurikulum_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Kurikulum</label>	
			  			<select name="kurikulum_id" class="form-control">
			  				@foreach($kurikulum as $data)
			  				<option value="{{ $data->id }}" {{ $selectedKuri == $data->id ? 'selected="selected"' : '' }} >{{ $data->nama_kurikulum }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('kurikulum_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('kurikulum_id') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Simpan</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection