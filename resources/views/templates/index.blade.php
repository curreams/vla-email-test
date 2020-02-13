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
                <h4 class="mt-5 mb-5">Templates</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('templates.template.create') }}" class="btn btn-success" title="Create New Template">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($templates) == 0)
            <div class="panel-body text-center">
                <h4>No Templates Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Section</th>
                            <th>Subject</th>
                            <th>Template</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($templates as $template)
                        <tr>
                            <td>{{ $template->VIT_TEMPLATE_NAME }}</td>
                            <td>{{ $template->VIT_SECTION }}</td>
                            <td>{{ $template->VIT_SUBJECT }}</td>
                            <td>{{ $template->VIT_TEMPLATE }}</td>

                            <td>

                                <form method="POST" action="{!! route('templates.template.destroy', $template->VIT_TEMPLATE_ID) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('templates.template.show', $template->VIT_TEMPLATE_ID ) }}" class="btn btn-info" title="Show Template">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('templates.template.edit', $template->VIT_TEMPLATE_ID ) }}" class="btn btn-primary" title="Edit Template">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Template" onclick="return confirm(&quot;Click Ok to delete Template.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $templates->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection