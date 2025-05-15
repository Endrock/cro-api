<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="client-weights-table">
            <thead>
            <tr>
                <th>Value</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clientWeights as $clientWeight)
                <tr>
                    <td>{{ $clientWeight->value }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['client-weights.destroy', $clientWeight->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('client-weights.show', [$clientWeight->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('client-weights.edit', [$clientWeight->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $clientWeights])
        </div>
    </div>
</div>
