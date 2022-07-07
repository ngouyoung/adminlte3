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
    <label for="code" class="col-md-2 col-sm-3 col-4 col-form-label text-right">Code:</label>
    <div class="col-md-8 col-sm-8 col-8">
        <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" id="code"
               placeholder="Code" @if(isset($object)) value="{{ $object->code }}"
               @else value="{{ old('code') }}" @endif>
        @error('code')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
