<!-- Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('value', 'Value:') !!}
    {!! Form::number('value', null, ['class' => 'form-control', 'required', 'step' => '0.25', 'max' => 1, 'min' => '0.25']) !!}
</div>