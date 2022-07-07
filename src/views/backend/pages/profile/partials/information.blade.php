@if(auth()->user())
    <div class="form-group row">
        <label for="name" class="col-md-2 col-sm-2 col-3 col-form-label text-right">Username</label>
        <div class="col-md-10 col-sm-10 col-9">
            <input type="text" id="name" name="name" value="{{ auth()->user()->name }}" class="form-control">
            <div class="invalid-feedback name">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-md-2 col-sm-2 col-3 col-form-label text-right">E-mail</label>
        <div class="col-md-10 col-sm-10 col-9">
            <input type="text" id="email" class="form-control" value="{{ auth()->user()->email }}" disabled>
        </div>
    </div>
    <div class="form-group row">
        <label for="username" class="col-md-2 col-sm-2 col-3 text-right">Roles</label>
        <div class="col-md-10 col-sm-10 col-9 text-left">
            @if(!auth()->user()->isAdmin)
                @if(!empty(auth()->user()->roles))
                    @foreach(auth()->user()->roles as $role)
                        <span class="badge badge-success">{{ $role->name }}</span>
                    @endforeach
                @endif
            @else
                <span class="badge badge-success"> All </span>
            @endif
        </div>

    </div>
    <div class="row justify-content-end">
        <div class="col-md-10 col-sm-10 col-9 text-left">
            <button type="submit" class="btn btn-sm btn-primary update-info"
                    data-remote="{{ route('admin.profile.update-info') }}">Update
            </button>
            <a class="btn btn-sm btn-warning" href="{{ route('admin.dashboard') }}">Cancel</a>
        </div>
    </div>
@endif
