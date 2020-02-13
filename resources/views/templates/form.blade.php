
<div class="form-group {{ $errors->has('VIT_TEMPLATE_NAME') ? 'has-error' : '' }}">
    <label for="VIT_TEMPLATE_NAME" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="VIT_TEMPLATE_NAME" type="text" id="VIT_TEMPLATE_NAME" value="{{ old('VIT_TEMPLATE_NAME', optional($template)->VIT_TEMPLATE_NAME) }}" minlength="1" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('VIT_TEMPLATE_NAME', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('VIT_SECTION') ? 'has-error' : '' }}">
    <label for="VIT_SECTION" class="col-md-2 control-label">Section</label>
    <div class="col-md-10">
        <input class="form-control" name="VIT_SECTION" type="text" id="VIT_SECTION" value="{{ old('VIT_SECTION', optional($template)->VIT_SECTION) }}" minlength="1" placeholder="Enter section here...">
        {!! $errors->first('VIT_SECTION', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('VIT_SUBJECT') ? 'has-error' : '' }}">
    <label for="VIT_SUBJECT" class="col-md-2 control-label">Subject</label>
    <div class="col-md-10">
        <input class="form-control" name="VIT_SUBJECT" type="text" id="VIT_SUBJECT" value="{{ old('VIT_SUBJECT', optional($template)->VIT_SUBJECT) }}" minlength="1" maxlength="255" placeholder="Enter subject here...">
        {!! $errors->first('VIT_SUBJECT', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('VIT_TEMPLATE') ? 'has-error' : '' }}">
    <label for="VIT_TEMPLATE" class="col-md-2 control-label">Template</label>
    <div class="col-md-10">
        <input class="form-control" name="VIT_TEMPLATE" type="text" id="VIT_TEMPLATE" value="{{ old('VIT_TEMPLATE', optional($template)->VIT_TEMPLATE) }}" minlength="1" placeholder="Enter template here...">
        {!! $errors->first('VIT_TEMPLATE', '<p class="help-block">:message</p>') !!}
    </div>
</div>

