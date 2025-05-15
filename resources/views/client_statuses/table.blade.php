<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="client-statuses-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Color</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clientStatuses as $clientStatus)
                <tr>
                    <td>{{ $clientStatus->name }}</td>
                    <td>{{ $clientStatus->description }}</td>
                    <td>{{ $clientStatus->color }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['client-statuses.destroy', $clientStatus->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('client-statuses.show', [$clientStatus->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('client-statuses.edit', [$clientStatus->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $clientStatuses])
        </div>
    </div>
</div>
