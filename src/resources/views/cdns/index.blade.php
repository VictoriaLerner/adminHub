@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="card mb-4 shadow-sm">
            <div class="card-header">Add New CDN</div>
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
                    @include('cdns._form', ['buttonText' => 'Create'])
                </form>

            </div>
        </div>


        <h2 class="mb-4">CDNs</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif



        {{-- CDNs table --}}
        <div class="card shadow-sm">
            <div class="card-header">All CDNs</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Login</th>
                        <th>Password</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($cdns as $cdn)
                        <tr>
                            <td>{{ $cdn->name }}</td>
                            <td>{{ $cdn->login }}</td>
                            <td>{{ $cdn->decrypted_password }}</td>

                            <td>
                                {{-- Edit --}}
                                <a href="{{ route('cdns.edit', $cdn->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                {{-- Delete --}}
                                <form action="{{ route('cdns.destroy', $cdn->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No CDNs found</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
