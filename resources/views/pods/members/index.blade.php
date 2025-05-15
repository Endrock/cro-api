@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">POD Members Overview</h1>

    <div class="row">
        @forelse ($pods as $pod)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-header">
                        <h5 class="mb-0">{{ $pod->name }}</h5>
                    </div>
                    <div class="card-body">
                        @if ($pod->users->isEmpty())
                            <p>No members assigned.</p>
                        @else
                            <ul class="list-group list-group-flush">
                                @foreach ($pod->users as $user)
                                    <li class="list-group-item">
                                        {{ $user->name }} 
                                        <small class="text-muted">({{ optional($user->role)->name ?? 'No Role' }})</small>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <div class="card-footer text-end">
                        <a href="{{ route('pods.members.edit', $pod->id) }}" class="btn btn-primary btn-sm">
                            Update Members
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <p>No PODs found.</p>
        @endforelse
    </div>
</div>
@endsection
