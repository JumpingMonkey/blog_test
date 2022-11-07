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
