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

<div class="form-group row">
    <label for="category_id" class="col-md-2 col-sm-3 col-4 col-form-label text-right">Category:</label>
    <div class="col-md-8 col-sm-8 col-8 @error('category_id') is-invalid @enderror">
        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
            @if(isset($object->category))
                <option value="{{ $object->category->id }}">{{ $object->category->name }}</option>
            @endif
        </select>
        @error('category_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="currency_id" class="col-md-2 col-sm-3 col-4 col-form-label text-right">Currency:</label>
    <div class="col-md-8 col-sm-8 col-8 @error('currency_id') is-invalid @enderror">
        <select class="form-control @error('currency_id') is-invalid @enderror" name="currency_id" id="currency_id">
            @if(isset($object->currency))
                <option value="{{ $object->currency->id }}">{{ $object->currency->name }}</option>
            @endif
        </select>
        @error('currency_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="slot_id" class="col-md-2 col-sm-3 col-4 col-form-label text-right">Slot:</label>
    <div class="col-md-8 col-sm-8 col-8 @error('slot_id') is-invalid @enderror">
        <select class="form-control @error('category_id') is-invalid @enderror" name="slot_id" id="slot_id">
            @if(isset($object->slot))
                <option value="{{ $object->slot->id }}">{{ $object->slot->name }}</option>
            @endif
        </select>
        @error('slot_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
