<div class="row">
    <div class="col-md-6">
        <fieldset>
            <legend class="text-center">Stock Information</legend>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-6">
                    <div class="form-group">
                        <label for="product_id" class="col-form-label text-right">Product:</label>
                        <div class="@error('product_id') is-invalid @enderror">
                            <select class="form-control rounded-0 @error('product_id') is-invalid @enderror"
                                    name="product_id"
                                    id="product_id">
                                @if(isset($object->product))
                                    <option value="{{ $object->product->id }}">{{ $object->product->name }}</option>
                                @endif
                            </select>
                            @error('product_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-6">
                    <div class="form-group">
                        <label for="batch" class="col-form-label text-right">Batch Number:</label>
                        <input type="text" class="form-control rounded-0 @error('batch') is-invalid @enderror"
                               name="batch"
                               id="batch"
                               placeholder="Batch Number" @if(isset($object)) value="{{ $object->batch }}"
                               @else value="{{ old('batch') }}" @endif>
                        @error('batch')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-6">
                    <div class="form-group">
                        <label for="expired_date" class="col-form-label text-right">Expire Date:</label>
                        <input type="text" class="form-control rounded-0 @error('expired_date') is-invalid @enderror"
                               name="expired_date" id="expired_date"
                               placeholder="Expire Price" @if(isset($object)) value="{{ Carbon\Carbon::parse($object->expired_date)->format('d/m/Y') }}"
                               @else value="{{ old('expired_date') }}" @endif>
                        @error('expired_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-6">
                    <div class="form-group">
                        <label for="currency_id" class="col-form-label text-right">Currency:</label>
                        <div class="@error('currency_id') is-invalid @enderror">
                            <select class="form-control rounded-0 @error('currency_id') is-invalid @enderror"
                                    name="currency_id"
                                    id="currency_id">
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
                </div>

                <div class="col-md-6 col-sm-6 col-6">
                    <div class="form-group">
                        <label for="custom_price" class="col-form-label text-right">Custom Price:</label>
                        <input type="number"
                               class="form-control rounded-0 @error('custom_price') is-invalid @enderror"
                               name="custom_price" id="customer_price"
                               placeholder="Custom Price" @if(isset($object)) value="{{ $object->custom_price }}"
                               @elseif(old('custom_price')) value="{{ old('custom_price') }}"
                               @else value="1" @endif>
                        @error('custom_price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-6">
                    <div class="form-group">
                        <label for="price" class="col-form-label text-right">Selling Price:</label>
                        <input type="number" class="form-control rounded-0 @error('price') is-invalid @enderror"
                               name="price"
                               id="price"
                               placeholder="Price" @if(isset($object)) value="{{ $object->price }}"
                               @elseif(old('price')) value="{{ old('price') }}" @else value="1" @endif>
                        @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
        </fieldset>
    </div>
    <div class="col-md-6">
        <fieldset>
            <legend class="text-center">Inventory Information</legend>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-6">
                    <div class="form-group">
                        <label for="supplier_id" class="col-form-label text-right">Supplier:</label>
                        <div class="@error('supplier_id') is-invalid @enderror">
                            <select class="form-control rounded-0 @error('supplier_id') is-invalid @enderror"
                                    name="supplier_id"
                                    id="supplier_id">
                                @if(isset($object->supplier))
                                    <option value="{{ $object->supplier->id }}">{{ $object->supplier->name }}</option>
                                @endif
                            </select>
                            @error('supplier_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-6">
                    <div class="form-group">
                        <label for="supplier_product_code" class="col-form-label text-right">Supplier Item Code:</label>
                        <input type="text"
                               class="form-control rounded-0 @error('supplier_product_code') is-invalid @enderror"
                               name="supplier_product_code" id="supplier_product_code"
                               placeholder="Supplier Item code"
                               @if(isset($object)) value="{{ $object->supplier_product_code }}"
                               @else value="{{ old('supplier_product_code') }}" @endif>
                        @error('supplier_product_code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-6">
                    <div class="form-group">
                        <label for="imported_date" class="col-form-label text-right">Import Date:</label>
                        <input type="text" class="form-control rounded-0 @error('import_date') is-invalid @enderror"
                               name="imported_date" id="imported_date"
                               placeholder="Import Price" @if(isset($object)) value="{{ Carbon\Carbon::parse($object->imported_date)->format('d/m/Y') }}"
                               @else value="{{ old('imported_date') }}" @endif>
                        @error('imported_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-6">
                    <div class="form-group">
                        <label for="quantity" class="col-form-label text-right">Quantity:</label>
                        <input type="number" class="form-control rounded-0 @error('quantity') is-invalid @enderror"
                               name="quantity"
                               id="quantity"
                               placeholder="Quantity" @if(isset($object)) value="{{ $object->quantity }}"
                               @elseif(old('quantity')) value="{{ old('quantity') }}" @else value="1" @endif>
                        @error('quantity')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
        </fieldset>
    </div>
</div>
