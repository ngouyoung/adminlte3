<div class="form-group row">
    <label for="password" class="col-md-2 col-sm-3 col-4 col-form-label text-right">Password:</label>
    <div class="col-md-8 col-sm-8 col-8">
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password"
               placeholder="Password">
        @error('password')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="password_confirmation" class="col-md-2 col-sm-3 col-4 col-form-label text-right">Confirm Password:</label>
    <div class="col-md-8 col-sm-8 col-8">
        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation"
               placeholder="Confirm Password">
        @error('password_confirmation')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
