<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="pods-table">
            <thead>
            <tr>
                <th>Name</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pods as $pod)
                <tr>
                    <td>{{ $pod->name }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['pods.destroy', $pod->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('pods.show', [$pod->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('pods.edit', [$pod->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            <a href="{{ route('pods.members.edit', [$pod->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-user"></i>
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
            @include('adminlte-templates::common.paginate', ['records' => $pods])
        </div>
    </div>
</div>
