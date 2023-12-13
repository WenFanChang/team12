<div class="form-group">
    {!! Form::label('name', '團員名稱:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('oid', '所屬團隊:') !!}
    {!! Form::select('oid', $orchestras, $orchestraSelected, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('position', '團員位置:') !!}
    {!! Form::text('position', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('height', '團員身高:') !!}
    {!! Form::text('height', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('weight', '團員體重:') !!}
    {!! Form::text('weight', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('year', '團員年資:') !!}
    {!! Form::text('year', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('age', '團員年齡:') !!}
    {!! Form::text('age', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('nationality', '團員國籍:') !!}
    {!! Form::text('nationality', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>