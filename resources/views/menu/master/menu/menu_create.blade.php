@php
    use Illuminate\Support\Facades\DB;
@endphp
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Master Menu') }}</div>

				<div class="card-body">
                    <a href="/mastermenu" class="btn btn-primary">Back</a>
                    <br/>
                    <br/>
                    
                    <form method="post" action="/mastermenu/store">
 
                        {{ csrf_field() }}
 
                        
                        <div class="form-group">
                            <label>Name</label>
                            <select name="menu_name" type="text" class="form-control">
                                <option value="">---Select---</option>
                                <option value="Dashboard">Dashboard</option>
                                <option value="Data Karyawan">Data Karyawan</option>
                                <option value="Master Role">Master Role</option>
                                <option value="Master Menu">Master Menu</option>
                                <option value="Master Role Menu">Master Role Menu</option>
                            </select>
 
                            @if($errors->has('menu_name'))
                                <div class="text-danger">
                                    {{ $errors->first('menu_name')}}
                                </div>
                            @endif
 
                        </div>

                        <div class="form-group">
                            <label>URL</label>
                            <select name="url_link" type="text" class="form-control">
                                <option value="">---Select---</option>
                                <option value="/dashboard">Dashboard</option>
                                <option value="/datakaryawan">Data Karyawan</option>
                                <option value="/masterrole">Master Role</option>
                                <option value="/mastermenu">Master Menu</option>
                                <option value="/masterrolemenu">Master Role Menu</option>
                            </select>
 
                            @if($errors->has('url_link'))
                                <div class="text-danger">
                                    {{ $errors->first('url_link')}}
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