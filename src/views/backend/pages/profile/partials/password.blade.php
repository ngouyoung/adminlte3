<div class="form-group row">
    <label for="old_password" class="col-md-2 col-sm-3 col-4 col-form-label text-right">Old Password</label>
    <div class="col-md-10 col-8">
        <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Old Password">
        <div class="invalid-feedback old_password"></div>
    </div>
</div>
<div class="form-group row">
    <label for="password" class="col-md-2 col-sm-3 col-4 col-form-label text-right">New Password</label>
    <div class="col-md-10 col-8">
        <input type="password" class="form-control" name="password" id="password" placeholder="New Password">
        <div class="invalid-feedback password"></div>
    </div>
</div>
<div class="form-group row">
    <label for="password_confirmation" class="col-md-2 col-sm-3 col-4 col-form-label text-right">Confirm
        Password</label>
    <div class="col-md-10 col-8">
        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
               placeholder="Confirm Password">
        <div class="invalid-feedback password_confirmation"></div>
    </div>
</div>
<div class="row justify-content-end">
    <div class="col-md-10 col-sm-9 col-8 text-left">
        <button type="submit" class="btn btn-sm btn-primary change-password"
                data-remote="{{ route('admin.profile.update-password') }}">Update
        </button>
        <a class="btn btn-sm btn-warning" href="{{ route('admin.dashboard') }}">Cancel</a>
    </div>
</div>
