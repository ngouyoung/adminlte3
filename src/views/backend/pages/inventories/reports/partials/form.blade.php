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

<div class="row">
    <label for="Image" class="col-md-2 col-sm-3 col-4 col-form-label text-right">Image:</label>
    <div class="col-md-8 col-sm-8 col-8">
        <div class="card" style="width: 175px">
            @if(isset($object->image)  && file_exists(public_path($object->image)))
                <img src="{{ asset($object->image) }}"
                     class="card-img img-thumbnail" alt="" id="avatar">
            @else
                <img src="{{ asset('img/default_category.png') }}"
                     class="card-img img-thumbnail" alt="" id="avatar">
            @endif
            <div class="card-img-overlay d-flex flex-column">
                <button type="button" id="changeImage"
                        class="mt-auto btn btn-sm btn-x-sm btn-block btn-secondary">
                    <i class="fas fa-image"></i> @if(isset($object->image)) Change @else Add @endif Image
                </button>
            </div>
            <input type="file" class="item-img file center-block" id="image" name="file_photo"
                   style="display:none;"/>
        </div>
    </div>
</div>

{{--<input type="hidden" name="image" id="image">--}}
