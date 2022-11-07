<div class=" mb-3">
    <label for="name">Name</label>
    <input id="name" class="form-control" type="text" name="name" value="{{ old('name', optional($user ?? null)->name) }}">
</div>
@error('name')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class=" mb-3">
    <label for="email">Email</label>
    <input id="email" class="form-control" type="text" name="email" value="{{ old('title', optional($user ?? null)->email) }}">
</div>
@error('email')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="mb-3">
    <label class="form-label">Password</label>
    <input name="password" required type="password"
           class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}"
           value="{{ old('password', optional($user ?? null)->password) }}">
    @if($errors->has('password'))
        <span class="invalid-feedback">
                {{ $errors->first('password') }}
            </span>
    @endif
</div>

<div class="mb-3">
    <label class="form-label">Retype password</label>
    <input name="password_confirmation" required type="password"
           class="form-control">
</div>
