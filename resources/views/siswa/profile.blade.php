@extends('layouts.master')

@section('title') Profile @endsection

@section('content')

<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					@if(session('sukses'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
					  <strong>Good!</strong> {{ session('sukses') }}
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>
					@endif

					@if(session('error'))
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  <strong>Bad!</strong> {{ session('error') }}
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>
					@endif
					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
										<img src="{{$siswa->getAvatar()}}" class="img-circle" alt="Avatar">
										<h3 class="name">{{$siswa->nama_depan}}</h3>
										<span class="online-status status-available">Available</span>
									</div>
									<div class="profile-stat">
										<div class="row">
											<div class="col-md-4 stat-item">
												{{$siswa->mapel->count()}} <span>Mata Pelajartan</span>
											</div>
											<div class="col-md-4 stat-item">
												15 <span>Awards</span>
											</div>
											<div class="col-md-4 stat-item">
												2174 <span>Points</span>
											</div>
										</div>
									</div>
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading">Basic Info</h4>
										<ul class="list-unstyled list-justify">
											<li>Jenis Kelamin <span>{{$siswa->jenis_kelamin}}</span></li>
											<li>Agama <span>{{$siswa->agama}}</span></li>
											<li>Alamat <span>{{$siswa->alamat}}</span></li>
											<li>Email <span>{{$siswa->nama_depan}} @gmail.com</span></li>
										</ul>
									</div>

									<div class="text-center"><a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning">Edit Profile</a></div>
								</div>
								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right">
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
								  Tambah Nilai
							</button>
								<!-- TABBED CONTENT -->
								<div class="custom-tabs-line tabs-line-bottom left-aligned">
									<ul class="nav" role="tablist">
										<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Recent Activity</a></li>
									</ul>
								</div>
								<div class="tab-content">
									<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Activities</h3>
								</div>
								<div class="panel-body">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>KODE</th>
												<th>MATA PELAJARAN</th>
												<th>SEMESTER</th>
												<th>NILAI</th>
												<th>GURU MAPEL</th>
											</tr>
										</thead>
										<tbody>
										@foreach($siswa->mapel as $mapel)
											<tr>
												<td>{{$mapel->kode}}</td>
												<td>{{$mapel->nama}}</td>
												<td>{{$mapel->semester}}</td>
												<td>{{$mapel->pivot->nilai}}</td>
												<td><a href="/guru/{{$mapel->guru_id}}/profile">{{$mapel->guru->nama}}</a></td>
											</tr>
										@endforeach
										</tbody>
									</table>
								</div>
							</div>	
								</div>
									
								</div>
								<!-- END TABBED CONTENT -->
							</div>
							<!-- END RIGHT COLUMN -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action='/siswa/{{$siswa->id}}/addnilai' method='post' enctype="multipart/form-data">
      		@csrf
      		<div class="form-group">
			    <label for="mapel">Mata Pelajaran</label>
			    <select class="form-control" id="mapel" name="mapel">
			    	@foreach($matapelajaran as $mp)
			      		<option value="{{$mp->id}}">{{$mp->nama}}</option>
			      	@endforeach
			    </select>
			</div>
		 	<div class="form-group {{$errors->has('nilai') ? 'has-error' : ''}}">
			    <label for="exampleFormControlInput1">Nilai</label>
			    <input name="nilai" type="number" class="form-control" id="exampleFormControlInput1" placeholder="Nilai" value="{{old('nilai')}}">
			    @if($errors->has('nilai'))
			    	<span class="help-lock">{{$errors->first('nilai')}}</span>
			    @endif
		  	</div>
      		<div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Save changes</button>
      		</div>
		</form>     
      </div>
    </div>
  </div>
</div>

@endsection