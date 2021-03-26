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
                    
                    <form method="post" action="/datakaryawan/store">
 
                        {{ csrf_field() }}
 
                        
                        <div class="form-group">
                            <label>Name</label>
                            <input name="name" type="text" class="form-control">
 
                             @if($errors->has('name'))
                                <div class="text-danger">
                                    {{ $errors->first('name')}}
                                </div>
                            @endif
 
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" type="email" class="form-control">
 
                             @if($errors->has('email'))
                                <div class="text-danger">
                                    {{ $errors->first('email')}}
                                </div>
                            @endif
 
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" type="password" class="form-control">
 
                             @if($errors->has('password'))
                                <div class="text-danger">
                                    {{ $errors->first('password')}}
                                </div>
                            @endif
 
                        </div>

                        <div class="form-group">
                            <label>Role</label>
                            <select name="role_id" type="text" class="form-control">
                                <option value="">---Select---</option>
                                @foreach($role as $value)
                                    <option value="{{$value->id}}">{{$value->role_name}}</option>
                                @endforeach
                            </select>
 
                            @if($errors->has('role_id'))
                                <div class="text-danger">
                                    {{ $errors->first('role_id')}}
                                </div>
                            @endif
 
                        </div>

                        <div class="form-group">
                            <input name="created_by" type="hidden" value="{{$auth}}" class="form-control">
 
                        </div>
 
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Submit">
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