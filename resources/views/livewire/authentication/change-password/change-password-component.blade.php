<div>
    <div class="row">
        <div class="col-md-8 offset-md-1">
            @if (session()->has('password-changed'))
                <div class="alert alert-success" role="alert">
                    <p> {{ session('password-changed') }}</p>
                </div>
            @endif
        </div>
    </div>
    <div class="row">

        <div class="col-md-6 offset-md-1">

            <form>
                <div class="form-group">
                    <label class="form-label" for="old_password">Old Password:@error('oldPassword')
                            <span class="text-danger">*{{ $message }}</span>
                        @enderror
                    </label>
                    <input wire:model.live="oldPassword" type="password" class="form-control" id="old_password">

                </div>
                <div class="form-group">
                    <label class="form-label" for="old_password">New Password:@error('newPassword')
                            <span class="text-danger">*{{ $message }}</span>
                        @enderror
                    </label>
                    <input wire:model.live="newPassword" type="password" class="form-control" id="new_password">
                </div>
                <div class="form-group">
                    <label class="form-label" for="old_password">New Password Confrim:@error('newPasswordConfrim')
                            <span class="text-danger">*{{ $message }}</span>
                        @enderror
                    </label>
                    <input wire:model.live="newPasswordConfrim" type="password" class="form-control"
                        id="new_password_confrim">
                </div>
                <button wire:click="changePassword" type="button" class="btn btn-sm btn-primary float-end">Change
                    Password</button>
            </form>
        </div>
    </div>


</div>
