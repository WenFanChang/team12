<div class="form-group">
    {!! Form::loable('name', '團員名稱:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::loable('oid', '所屬團隊:') !!}
</div>
<div class="form-group">
    {!! Form::loable('position', '團員位置:') !!}
    {!! Form::date('position', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::loable('height', '團員身高:') !!}
    {!! Form::date('height', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::loable('weight', '團員體重:') !!}
    {!! Form::date('weight', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::loable('year', '團員年資:') !!}
    {!! Form::date('year', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::loable('age', '團員年齡:') !!}
    {!! Form::date('age', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::loable('nationality', '團員國籍:') !!}
    {!! Form::date('nationality', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>