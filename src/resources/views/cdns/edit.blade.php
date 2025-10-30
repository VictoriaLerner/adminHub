@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header">{{ __('Edit Cdn') }}</div>

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

                            <form action="{{ route('cdns.update', $cdn->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                @include('cdns._form', ['cdn' => $cdn, 'buttonText' => 'Update'])
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
