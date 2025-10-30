@php

    $name = old('name', $cdn->name ?? '');
    $login = old('login', $cdn->login ?? '');
@endphp

<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ $name }}" required>
</div>

<div class="mb-3">
    <label for="login" class="form-label">Login</label>
    <input type="text" name="login" id="login" class="form-control" value="{{ $login }}" required>
</div>

<div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password" id="password" class="form-control" {{ isset($cdn) ? '' : 'required' }}>
</div>

<button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
