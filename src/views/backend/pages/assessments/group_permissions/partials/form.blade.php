<div class="form-group row">
    <label for="name" class="col-md-2 col-sm-3 col-4 col-form-label text-right">Name:</label>
    <div class="col-md-8 col-sm-8 col-8">
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
               placeholder="Name" @if(isset($object)) value="{{ $object->name }}"
               @else value="{{ old('name') }}" @endif>
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

@if(!isset($object) || $object->id !== 1)
    <div class="form-group row">
        <label for="parent_id" class="col-md-2 col-sm-3 col-4 col-form-label text-right">Group:</label>
        <div class="col-md-8 col-sm-8 col-8 @error('parent_id') is-invalid @enderror">
            <select class="form-control @error('parent_id') is-invalid @enderror" name="parent_id" id="parent_id">
                @if(isset($object->parent))
                    <option value="{{ $object->parent->id }}">{{ $object->parent->name }}</option>
                @endif
                @if(isset($default))
                    <option value="{{ $default->id }}">{{ $default->name }}</option>
                @endif
            </select>
            @error('parent_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
@endif

<div class="form-group row">
    <label for="name" class="col-md-2 col-sm-3 col-4 col-form-label text-right">Sort:</label>
    <div class="col-md-8 col-sm-8 col-8">
        <input type="number" class="form-control @error('sort') is-invalid @enderror" name="sort" id="sort"
               placeholder="Sort" @if(isset($object)) value="{{ $object->sort }}"
               @else value="{{ old('sort') }}" @endif>
        @error('sort')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
