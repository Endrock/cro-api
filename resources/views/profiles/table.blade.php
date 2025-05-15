<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="profiles-table">
            <thead>
            <tr>
                <th>User Id</th>
                <th>Github Username</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($profiles as $profile)
                <tr>
                    <td>{{ $profile->user_id }}</td>
                    <td>{{ $profile->github_username }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['profiles.destroy', $profile->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('profiles.show', [$profile->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('profiles.edit', [$profile->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $profiles])
        </div>
    </div>
</div>
