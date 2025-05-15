<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $profile->user_id }}</p>
</div>

<!-- Github Username Field -->
<div class="col-sm-12">
    {!! Form::label('github_username', 'Github Username:') !!}
    <p>{{ $profile->github_username }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $profile->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $profile->updated_at }}</p>
</div>

