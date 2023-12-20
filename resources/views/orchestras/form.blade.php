<div class="form-group">
    {!! Form::label('name', '樂團名稱:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('company', '公司名稱:') !!}
    {!! Form::text('company', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('city', '公司位置:') !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('style', '曲風類別:') !!}
    {!! Form::text('style', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
{!! Form::submit($submitButtonText,['class'=>'btn btn-primary form-control']) !!}
</div>