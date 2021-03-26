@php
    use Illuminate\Support\Facades\DB;
@endphp
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Master Role Menu') }}</div>

				<div class="card-body">
                    <a href="/masterrolemenu" class="btn btn-primary">Back</a>
                    <br/>
                    <br/>
                    
                    <form method="post" action="/masterrolemenu/store">
 
                        {{ csrf_field() }}
 
                        
                        <div class="form-group">
                            <label>Role Name</label>
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
                            <label>Menu Name</label>
                            <select name="menu_id" type="text" class="form-control">
                                <option value="">---Select---</option>
                                @foreach($menu as $value)
                                    <option value="{{$value->id}}">{{$value->menu_name}}</option>
                                @endforeach
                            </select>
 
                            @if($errors->has('menu_id'))
                                <div class="text-danger">
                                    {{ $errors->first('menu_id')}}
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