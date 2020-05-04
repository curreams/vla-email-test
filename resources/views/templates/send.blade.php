@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
    <div class="alert alert-success">
        <span class="glyphicon glyphicon-ok"></span>
        {!! session('success_message') !!}

        <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">&times;</span>
        </button>

    </div>
    @endif

    <div class="panel panel-default">
  
        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Send Template </h4>
            </div>
        </div>

        <div class="panel-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('templates.template.searchTemplates') }}" id="search_template_form" name="search_template_form" accept-charset="UTF-8" class="form-horizontal">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="POST">
                <div class="form-group {{ $errors->has('Search') ? 'has-error' : '' }}">
                    <label for="email_addresses" class="col-md-2 control-label">Search Template by Name <br></label>
                    <div class="col-md-10">
                        <input class="form-control" name="search" type="text" id="search"  minlength="1" placeholder="Enter Template by Name...">
                        {!! $errors->first('search', '<p class="help-block">:message</p>') !!}
                    <input class="btn btn-primary" type="submit" value="Search">
                    </div>
    
                </div>

            </form>

            <form method="POST" action="{{ route('templates.template.sendEmail') }}" id="send_template_form" name="send_template_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="POST">

            <div class="form-group {{ $errors->has('Address') ? 'has-error' : '' }}">
                <label for="email_addresses" class="col-md-2 control-label">Email Address <br><small> separate each email with ; </small></label>
                <div class="col-md-10">
                    <input class="form-control" name="email_addresses" type="text" id="email_addresses"  minlength="1" placeholder="Enter email address here...">
                    {!! $errors->first('Address', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('VIT_TEMPLATE') ? 'has-error' : '' }}">
                <label for="VIT_TEMPLATE" class="col-md-2 control-label">Template <br><small> select one or multiple with ctrl + click </small></label>
                <div class="col-md-10">
                    <select class="form-control" style="height: 250px;" id="template" name="templates[]" multiple>
                        @foreach ($templates as $key => $template)
                            <option value="{{ json_encode($template) }}">
                                {{ $template['name'] }}
                            </option>
                        @endforeach
                    </select>

                </div>
            </div>

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Send">
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection