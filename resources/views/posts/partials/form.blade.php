<div class=" mb-3">
    <label for="title">Title</label>
    <input id="title" class="form-control" type="text" name="title" value="{{ old('title', optional($post ?? null)->title) }}">
</div>
@error('title')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class=" mb-3">
    <label for="content">Content</label>
    <textarea id="content" class="form-control" name="content">{{  old('content', optional($post ?? null)->content) }}</textarea>
</div>
@error('content')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-check pb-3">
    <input class="form-check-input" type="checkbox" id="flexCheckDefault"
           name="status" value=1 {{ old('status', optional($post ?? null)->status) ? 'checked' : '' }}>
    <label class="form-check-label" for="flexCheckDefault">
        Active
    </label>
</div>

@error('status')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

<select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" name="category_id">
    <option selected>Category</option>

    @foreach($categories as $key => $category)
        @if (old('category_id') == $category)
            <option value="{{ $category }}"  selected="selected">{{$key}}</option>
        @elseif($category == ($categoryId ?? 0))
            <option value="{{ $category }}"  selected="selected">{{$key}}</option>
        @else
            <option value="{{ $category }}">{{$key}}</option>
        @endif
    @endforeach
</select>
@error('category_id')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="mb-3 pb-3">
    <input type="datetime-local" name="published_date"

           value ={{ \Carbon\Carbon::parse(optional($post ?? null)->published_date)->format('yyyy-MM-ddThh:mm')  }}>
</div>
@error('published_date')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
