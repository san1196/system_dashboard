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

				<div class="card-body">
                    <a href="/datakaryawan" class="btn btn-primary">Back</a>
                    <br/>
                    <br/>
                    
 
                    <form method="post" action="/datakaryawan/update/{{ $karyawan->id }}">
 
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
 
                        <div class="form-group">
                            <label>Name</label>
                            <input name="name" type="text" class="form-control" value="{{ $karyawan->name }}">
 
                             @if($errors->has('name'))
                                <div class="text-danger">
                                    {{ $errors->first('name')}}
                                </div>
                            @endif
 
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" type="email" class="form-control" value="{{ $karyawan->email }}" readonly>
 
                             @if($errors->has('email'))
                                <div class="text-danger">
                                    {{ $errors->first('email')}}
                                </div>
                            @endif
 
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" type="password" class="form-control">
 
                        </div>

                        <div class="form-group">
                            <label>Role Name</label>
                            <select name="role_id" type="text" class="form-control" value="{{ $karyawan->role_id }}">
                                <option value="">---Select---</option>
                                @foreach($role as $value)
                                    <option value="{{$value->id}}" @if($karyawan->role_id == $value->id) selected='selected' @endif >{{$value->role_name}}</option>
                                @endforeach
                            </select>
 
                            @if($errors->has('role_id'))
                                <div class="text-danger">
                                    {{ $errors->first('role_id')}}
                                </div>
                            @endif
 
                        </div>

                        <div class="form-group">
                            <label>Active</label>
                            <select name="active" type="text" class="form-control" value="{{ $karyawan->active }}">
                                <option value="">---Select---</option>
                                <option value="1" @if($karyawan->active == '1') selected='selected' @endif >Yes</option>
                                <option value="0" @if($karyawan->active == '0') selected='selected' @endif >No</option>
                            </select>
 
                        </div>

                        <div class="form-group">
                            <label>Block</label>
                            <select name="block" type="text" class="form-control" value="{{ $karyawan->block }}">
                                <option value="">---Select---</option>
                                <option value="1" @if($karyawan->block == '1') selected='selected' @endif >1</option>
                                <option value="0" @if($karyawan->block == '0') selected='selected' @endif >0</option>
                            </select>
 
                        </div>
 
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Update">
                        </div>
 
                    </form>
 
                </div>
            </div>
        </div>
    </div>
</div>
<!--<script>
    tinymce.init({
        selector: 'textarea',
        height: 200,
        plugins: [
          'advlist autolink lists link image charmap print preview anchor',
          'searchreplace visualblocks code fullscreen',
          'insertdatetime media table contextmenu paste code'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        content_css: [
          '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
          '//www.tinymce.com/css/codepen.min.css'
        ]
    });
</script>-->
@endsection
