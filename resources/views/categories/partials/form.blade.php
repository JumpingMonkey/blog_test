<div class=" mb-3">
    <label for="name">Title</label>
    <input id="name" class="form-control" type="text" name="name" value="{{ old('name', optional($category ?? null)->name) }}">
</div>
@error('name')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-check pb-3">
    <input class="form-check-input" type="checkbox" id="flexCheckDefault"
           name="status" value=1 {{ old('status', optional($category ?? null)->status) ? 'checked' : '' }}>
    <label class="form-check-label" for="flexCheckDefault">
        Active
    </label>
</div>

@error('status')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
