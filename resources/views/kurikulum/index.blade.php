@extends('layouts.admin')
@section('content')

	<div class="row">
	<div class="container">
	<div class="col-md-12">
	<div class="panel panel-primary">
		<div class="panel-heading">Data Kategori Galeri
			<div class="panel-title pull-right"><a href="{{ route('kurikulum.create') }}">Tambah Data</a>
		</div>
	</div>
	<div class="panel-body">
	<div class="table-responsive table--no-card m-b-30">
	<table class="table table-borderless table-striped table-earning">
	<thead>
		<tr>
					<th>No</th>
					<th>Kurikulum</th>
					<th>Keterangan Kurikulum</th>
					<th>Kepala Sekolah</th>
					<th>Wakil Kepala Sekolah</th>
					<th>Guru</th>
					<th>Staf</th>
					<th colspan="3">Action</th>
				</tr>	
	           </thead>
	             <tbody>
		            <?php $nomor = 1; ?>
		  		@php $no = 1; @endphp
		  		@foreach($a as $data)
                         <tr>
                            <td>{{$no++}}</td>
							<td>{{$data->nama_kurikulum}}</td>
							<td>{{$data->ket_kurikulum}}</td>
							<td>{{$data->nama_kepsek}}</td>
							<td>{{$data->nama_wkepsek}}</td>
							<td>@foreach($data->guru as $guru)<li>{{ $guru->nama_guru }}@endforeach</li></td>
							<td>@foreach($data->staf as $staf)<li>{{ $staf->nama_staf }}@endforeach</li></td>
							<td>
		<a class="btn btn-primary" href=" {{ route('kurikulum.edit',$data->id)}} ">Ubah</a>
	</td>
	<td>
		<a class="btn btn-success" href=" {{ route('kurikulum.show',$data->id)}} ">Lihat</a>
	</td>
	<td>
		<form method="post" action="{{ route('kurikulum.destroy',$data->id) }}">
		<input name="_token" type="hidden" value="{{ csrf_token() }}">
		<input type="hidden" name="_method" value="DELETE">

		<button type="submit" class="btn btn-danger">Hapus</button>
	</form>
	</td>
	</tr>
	@endforeach
	</tbody>
	</table>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	@endsection