@php
    use Illuminate\Support\Facades\DB;
@endphp
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Data Karyawan') }}</div>

				<div class="card-body" style="overflow-y: scroll; overflow-x: scroll; height: 450px;">
					@if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
					
					<a href="/datakaryawan/tambah" class="btn btn-primary">Input Data Karyawan</a>
        
					<br/>
					<br/>
					<form action="/datakaryawan" method="GET">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-4" style="padding-right: 0px;">
								<input type="text" autocomplete="{{app()->environment() === 'local' ? 'on' : 'off'}}" class="form-control" style="border-radius: 20px; font-size: 12px;" placeholder="Search by Name" name="filter" value="{{ old('filter') }}">
							</div>
							<div class="col-md-2" style="padding-right: 10px;">
								<button type="submit" class="btn btn-primary">Search</button>
                            </div>
                            <div class="col-md-6"></div>
						</div>
					</div>
                    </form>
					<br/>
                    <?php
                        $auth = Auth::user()->role_id;
                        $role = DB::table('master_role')->where('id',$auth)->select('master_role.role_name')->first();
                    ?>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Active</th>
                                <th>Block</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if($role->role_name == 'Admin')
                            @foreach($karyawan as $p)
                            <tr>
                                    <td>{{ $p->name }}</td>
                                    <td>{{ $p->email }}</td>
                                    <td>{{ $p->role_name }}</td>
                                    <td>{{ $p->active }}</td>
                                    <td>{{ $p->block }}</td>
                                    <td>{{date('d F Y', strtotime($p->created_at))}}</td>
                                    <td>{{date('d F Y', strtotime($p->updated_at))}}</td>
                                    <td>
                                        <a href="/datakaryawan/edit/{{ $p->id }}" class="btn btn-warning">Edit</a>&emsp;
                                        @if((Auth::user()->id != $p->id) && ($role->role_name == 'Admin'))
                                            <a href="/datakaryawan/hapus/{{ $p->id }}" class="btn btn-danger">Hapus</a>
                                        @endif
                                    </td>
                            </tr>
                            @endforeach
                        @else
                            @foreach($karyawan as $p)
                            <tr>
                                @if($p->id == Auth::user()->id)
                                    <td>{{ $p->name }}</td>
                                    <td>{{ $p->email }}</td>
                                    <td>{{ $p->role_name }}</td>
                                    <td>{{ $p->active }}</td>
                                    <td>{{ $p->block }}</td>
                                    <td>{{date('d F Y', strtotime($p->created_at))}}</td>
                                    <td>{{date('d F Y', strtotime($p->updated_at))}}</td>
                                    <td>
                                        <a href="/datakaryawan/edit/{{ $p->id }}" class="btn btn-warning">Edit</a>&emsp;
                                        @if((Auth::user()->id != $p->id) && ($role->role_name == 'Admin'))
                                            <a href="/datakaryawan/hapus/{{ $p->id }}" class="btn btn-danger">Hapus</a>
                                        @endif
                                    </td>
                                @endif
                            </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
					<div class="box-footer clearfix">
						<div class="col-sm-12 col-md-5">
							Showing {{ $karyawan->perPage() }} of {{ $karyawan->total() }} entries
						</div>
						<div class="col-sm-12 col-md-7">
							<ul class="pagination pagination-sm no-margin pull-right">
								{{ $karyawan->links() }}
							</ul>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection