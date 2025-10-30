@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">

                {{-- Add Cdn Form --}}
                <div class="card shadow-sm mb-4">
                    <div class="card-header">Add Site</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('cdns.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Admin URL</label>
                                <input type="text" name="name" id="name" class="form-control"
                                       value="{{ old('name') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="domain" class="form-label">Domain</label>
                                <input type="text" name="domain" id="domain" class="form-control"
                                       value="{{ old('domain') }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>

                {{-- Sites List --}}
                <div class="card shadow-sm">
                    <div class="card-header">All Sites</div>

                    <div class="card-body">
                        @php
                            $sites = [
                                ['id' => 1, 'admin_url' => 'https://admin.site1.com', 'domain' => 'site1.com'],
                                ['id' => 2, 'admin_url' => 'https://panel.site2.net', 'domain' => 'site2.net'],
                                ['id' => 3, 'admin_url' => 'https://dashboard.site3.org', 'domain' => 'site3.org'],
                            ];
                        @endphp

                        @if (count($sites) > 0)
                            <table class="table table-bordered align-middle">
                                <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Admin URL</th>
                                    <th>Domain</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($sites as $site)
                                    <tr>
                                        <td>{{ $site['id'] }}</td>
                                        <td>
                                            <a href="{{ $site['admin_url'] }}" target="_blank" class="text-decoration-none">
                                                {{ $site['admin_url'] }}
                                            </a>
                                        </td>
                                        <td>{{ $site['domain'] }}</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="#" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this site?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="text-muted">No sites found.</p>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
