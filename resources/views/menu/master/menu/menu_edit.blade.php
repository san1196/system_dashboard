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
                    
 
                    <form method="post" action="/mastermenu/update/{{ $menu->id }}">
 
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
 
                        <div class="form-group">
                            <label>Name</label>
                            <select name="menu_name" type="text" class="form-control" value="{{ $menu->menu_name }}">
                                <option value="">---Select---</option>
                                <option value="Dashboard" @if($menu->menu_name == 'Dashboard') selected='selected' @endif >Dashboard</option>
                                <option value="Data Karyawan" @if($menu->menu_name == 'Data Karyawan') selected='selected' @endif >Data Karyawan</option>
                                <option value="Master Role" @if($menu->menu_name == 'Master Role') selected='selected' @endif >Master Role</option>
                                <option value="Master Menu" @if($menu->menu_name == 'Master Menu') selected='selected' @endif >Master Menu</option>
                                <option value="Master Role Menu" @if($menu->menu_name == 'Master Role Menu') selected='selected' @endif >Master Role Menu</option>
                            </select>
 
                            @if($errors->has('menu_name'))
                                <div class="text-danger">
                                    {{ $errors->first('menu_name')}}
                                </div>
                            @endif
 
                        </div>

                        <div class="form-group">
                            <label>URL</label>
                            <select name="url_link" type="text" class="form-control" value="{{ $menu->url_link }}">
                                <option value="">---Select---</option>
                                <option value="/dashboard" @if($menu->url_link == '/dashboard') selected='selected' @endif >Dashboard</option>
                                <option value="/datakaryawan" @if($menu->url_link == '/datakaryawan') selected='selected' @endif >Data Karyawan</option>
                                <option value="/masterrole" @if($menu->url_link == '/masterrole') selected='selected' @endif >Master Role</option>
                                <option value="/mastermenu" @if($menu->url_link == '/mastermenu') selected='selected' @endif >Master Menu</option>
                                <option value="/masterrolemenu" @if($menu->url_link == '/masterrolemenu') selected='selected' @endif >Master Role Menu</option>
                            </select>
 
                            @if($errors->has('url_link'))
                                <div class="text-danger">
                                    {{ $errors->first('url_link')}}
                                </div>
                            @endif
 
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
