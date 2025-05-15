<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('primary_site_url', 'Primary Site URL:') !!}
    {!! Form::text('primary_site_url', null, ['class' => 'form-control', 'required']) !!}
</div>
<!-- Client Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_status_id', 'Client Status:') !!}
    {!! Form::select('client_status_id', $clientStatuses, null, ['class' => 'form-control', 'placeholder' => 'Select Status']) !!}
</div>
<!-- Client Weight Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_weight_id', 'Client Weight:') !!}
    {!! Form::select('client_weight_id', $clientWeights, null, ['class' => 'form-control', 'placeholder' => 'Select Weight']) !!}
</div>
<!-- Account Manager Field -->
<div class="form-group col-sm-6">
    {!! Form::label('account_manager_id', 'Account Manager:') !!}
    {!! Form::select('account_manager_id', $accountManagers, null, ['class' => 'form-control', 'placeholder' => 'Select Account Manager']) !!}
</div>
