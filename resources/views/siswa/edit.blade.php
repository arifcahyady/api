@extends('layouts.master')

@section('title') Edit @endsection


@section('content')
	
	<div class="main">
		<div class="main-content">
			<div class="container-flui">
				<h3 class="page-title">Edit Tables</h3>
				<div class="row">
					<div class="col-md-12">
						<form action='/siswa/{{$siswa->id}}/update' method='post' enctype="multipart/form-data">
      		@csrf
		  <div class="form-group">
		    <label for="exampleFormControlInput1">Nama Depan</label>
		    <input name="nama_depan" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Depan" value="{{ $siswa->nama_depan }}">
		  </div>

		    <div class="form-group">
		    <label for="exampleFormControlInput1">Nama Belakang</label>
		    <input name="nama_belakang" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Belakang" value="{{ $siswa->nama_belakang }}">
		  </div>

		  <div class="form-group">
		    <label for="exampleFormControlSelect1">Jenis Kelamain</label>
		    <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
		      <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki Laki</option>
		      <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
		    </select>
		  </div>

		    <div class="form-group">
		    <label for="exampleFormControlInput1">Agama</label>
		    <input name="agama" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Agama" value="{{ $siswa->agama }}">
		  </div>

		  <div class="form-group">
		    <label for="exampleFormControlTextarea1">Alamat</label>
		    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $siswa->alamat }}</textarea>
		  </div>

		  <div class="form-group">
		    <label for="exampleFormControlTextarea1">Avatar</label>
		    <input type="file" name="avatar" class="form-control">
		  </div>

	      <div class="modal-footer">
	      <a href="/siswa"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></a>
	      <button type="submit" class="btn btn-warning">Update</button>
      	  </div>
       	</form>
					</div>
				</div>
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
		<div class="col-lg-12">
		  <form action='/siswa/{{$siswa->id}}/update' method='post'>
      		@csrf
		  <div class="form-group">
		    <label for="exampleFormControlInput1">Nama Depan</label>
		    <input name="nama_depan" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Depan" value="{{ $siswa->nama_depan }}">
		  </div>

		    <div class="form-group">
		    <label for="exampleFormControlInput1">Nama Belakang</label>
		    <input name="nama_belakang" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Belakang" value="{{ $siswa->nama_belakang }}">
		  </div>

		  <div class="form-group">
		    <label for="exampleFormControlSelect1">Jenis Kelamain</label>
		    <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
		      <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki Laki</option>
		      <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
		    </select>
		  </div>

		    <div class="form-group">
		    <label for="exampleFormControlInput1">Agama</label>
		    <input name="agama" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Agama" value="{{ $siswa->agama }}">
		  </div>

		  <div class="form-group">
		    <label for="exampleFormControlTextarea1">Alamat</label>
		    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $siswa->alamat }}</textarea>
		  </div>
	      <div class="modal-footer">
	      <a href="/siswa"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></a>
	      <button type="submit" class="btn btn-warning">Update</button>
      	  </div>
       	</form>
     </div>

@endsection



