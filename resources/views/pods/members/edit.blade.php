@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Manage Members for {{ $pod->name }}</h1>

    {!! Form::model($pod, ['route' => ['pods.members.update', $pod->id], 'method' => 'post']) !!}
        <div class="form-group">
            {!! Form::label('user_ids', 'Select Members') !!}
            {!! Form::select('user_ids[]', $eligibleUsers, $currentMembers, ['class' => 'form-control', 'multiple' => true]) !!}
        </div>

        {!! Form::submit('Update Members', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
</div>
@endsection
