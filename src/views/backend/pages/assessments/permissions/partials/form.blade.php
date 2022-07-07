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

<div class="form-group row">
    <label for="group_id" class="col-md-2 col-sm-3 col-4 col-form-label text-right">Group:</label>
    <div class="col-md-8 col-sm-8 col-8 @error('group_id') is-invalid @enderror">
        <select class="form-control @error('group_id') is-invalid @enderror" name="group_id" id="group_id">
            @if(isset($object->group))
                <option value="{{ $object->group->id }}">{{ $object->group->name }}</option>
            @endif
            @if(isset($default))
                <option value="{{ $default->id }}">{{ $default->name }}</option>
            @endif
        </select>
        @error('group_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
