
@extends('layouts.master')

@section('title') Home @endsection

@section('content')
	
	<div class="main">
		<div class="main-content">
			<div class="container-flui">
				<h3 class="page-title">Info Tables</h3>
				<div class="row">
					<div class="col-md-12">
						<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Data Siswa</h3>
									<div class="right">
											<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">Tambah Siswa<i class="lnr lnr-plus-circle"></i></button>
										</div>
									</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>NAMA DEPAN</th>
												<th>NAMA BELAKANG</th>
												<th>JENIS KELAMIN</th>
												<th>AGAMA</th>
												<th>ALAMAT</th>
												<th>AKSI</th>
											</tr>
										</thead>
										<tbody>
											@foreach($data as $siswa)

											<tr>
												<td><a href="/siswa/{{$siswa->id}}/profile">{{ $siswa->nama_depan }}</a></td>
												<td><a href="/siswa/{{$siswa->id}}/profile">{{ $siswa->nama_belakang }}</a></td>
												<td>{{ $siswa->jenis_kelamin }}</td>
												<td>{{ $siswa->agama }}</td>
												<td>{{ $siswa->alamat }}</td>
												<td>
													<a href="/siswa/{{$siswa->id}}/edit" class="text-warning">Edit</a>
													<a href="/siswa/{{$siswa->id}}/delete" class="text-danger ml-4" onclick='return confirm("Data akan di hapus Lanjutkan ?")'>Delete</a>
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
	</div>

	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
      <form action='/siswa/create' method='post' enctype="multipart/form-data">
      	@csrf
		  <div class="form-group {{$errors->has('nama_depan') ? 'has-error' : ''}}">
		    <label for="exampleFormControlInput1">Nama Depan</label>
		    <input name="nama_depan" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Depan" value="{{old('nama_depan')}}">
		    @if($errors->has('nama_depan'))
		    	<span class="help-lock">{{$errors->first('nama_depan')}}</span>
		    @endif
		  </div>

		    <div class="form-group">
		    <label for="exampleFormControlInput1">Nama Belakang</label>
		    <input name="nama_belakang" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Belakang" value="{{old('nama_belakang')}}">
		    
		  </div>

		   <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
		    <label for="exampleFormControlInput1">Email</label>
		    <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="Email">
		  	@if($errors->has('email'))
		    	<span class="help-lock">{{$errors->first('email')}}</span>
		    @endif
		  </div>

		  <div class="form-group">
		    <label for="exampleFormControlSelect1">Jenis Kelamain</label>
		    <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
		      <option value="L">Laki Laki</option>
		      <option value="P">Perempuan</option>
		    </select>
		  </div>

		    <div class="form-group {{$errors->has('agama') ? 'has-error' : ''}}">
		    <label for="exampleFormControlInput1">Agama</label>
		    <input name="agama" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Agama">
		  	@if($errors->has('agama'))
		    	<span class="help-lock">{{$errors->first('agama')}}</span>
		    @endif
		  </div>

		  <div class="form-group {{$errors->has('alamat') ? 'has-error' : ''}}">
		    <label for="exampleFormControlTextarea1">Alamat</label>
		    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{old('alamat')}}</textarea>
		    @if($errors->has('alamat'))
		    	<span class="help-lock">{{$errors->first('alamat')}}</span>
		    @endif
		  </div>

		   <div class="form-group {{$errors->has('avatar') ? 'has-error' : ''}}">
		    <label for="exampleFormControlTextarea1">Avatar</label>
		    <input type="file" name="avatar" class="form-control">
		    @if($errors->has('avatar'))
		    	<span class="help-lock">{{$errors->first('avatar')}}</span>
		    @endif
		  </div>

	      <div class="modal-footer">
	      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      <button type="submit" class="btn btn-primary">Tambah</button>
      	  </div>
       </form>

    </div>
  </div>
</div>

@endsection

@section('content1')

	@if(session('sukses'))
	<div class="alert alert-success alert-dismissible fade show" role="alert">
	  <strong>Good!</strong> {{ session('sukses') }}
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>
	@endif
	<div class="row mb-5">
		<div class="col-6">
			<h1>Data Siswa</h1>
		</div>
		<div class="col-6 float-right">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
				Tambah data santri
			</button>
		</div>
	</div>
	<table class="table table-hover">
	<tr>
		<th>NAMA DEPAN</th>
		<th>NAMA BELAKANG</th>
		<th>JENIS KELAMIN</th>
		<th>AGAMA</th>
		<th>ALAMAT</th>
		<th>AKSI</th>
	</tr>

	@foreach($data as $siswa)

	<tr>
		<td>{{ $siswa->nama_depan }}</td>
		<td>{{ $siswa->nama_belakang }}</td>
		<td>{{ $siswa->jenis_kelamin }}</td>
		<td>{{ $siswa->agama }}</td>
		<td>{{ $siswa->alamat }}</td>
		<td>
			<a href="/siswa/{{$siswa->id}}/edit" class="text-warning">Edit</a>
			<a href="/siswa/{{$siswa->id}}/delete" class="text-danger ml-4" onclick='return confirm("Data akan di hapus Lanjutkan ?")'>Delete</a>
		</td>
	</tr>

	@endforeach
	</table>
	<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
      <form action='/siswa/create' method='post'>
      	@csrf
		  <div class="form-group">
		    <label for="exampleFormControlInput1">Nama Depan</label>
		    <input name="nama_depan" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Depan">
		  </div>

		    <div class="form-group">
		    <label for="exampleFormControlInput1">Nama Belakang</label>
		    <input name="nama_belakang" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Belakang">
		  </div>

		  <div class="form-group">
		    <label for="exampleFormControlSelect1">Jenis Kelamain</label>
		    <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
		      <option value="L">Laki Laki</option>
		      <option value="P">Perempuan</option>
		    </select>
		  </div>

		    <div class="form-group">
		    <label for="exampleFormControlInput1">Agama</label>
		    <input name="agama" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Agama">
		  </div>

		  <div class="form-group">
		    <label for="exampleFormControlTextarea1">Alamat</label>
		    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
		  </div>
	      <div class="modal-footer">
	      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      <button type="submit" class="btn btn-primary">Tambah</button>
      	  </div>
       </form>

    </div>
  </div>
</div> -->


@endsection



