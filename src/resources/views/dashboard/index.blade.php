@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Dashboard - Sites</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-header">Sites List</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Domain</th>
                        <th>Admin URL</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($sites as $site)
                        <tr>
                            <td>{{ $site->domain }}</td>
                            <td>{{ $site->admin_url }}</td>
                            <td>
                                <form action="{{ route('dashboard.check-status', $site->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-info">
                                        Check Status
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No sites found</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
