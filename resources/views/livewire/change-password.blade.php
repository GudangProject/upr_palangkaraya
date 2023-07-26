<div>
    <form wire:submit.prevent="submit" class="validate-form" action="#">
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="account-old-password">Old Password</label>
                    <div class="input-group form-password-toggle input-group-merge">
                        <input wire:model='passwordOld' type="password" class="form-control" id="account-old-password" name="password" placeholder="Old Password" />
                        <div class="input-group-append">
                            <div class="input-group-text cursor-pointer">
                                <i data-feather="eye"></i>
                            </div>
                        </div>
                    </div>
                    @error('passwordOld') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="account-new-password">New Password</label>
                    <div class="input-group form-password-toggle input-group-merge">
                        <input wire:model='password' type="password" id="password" name="new-password" class="form-control" placeholder="New Password" />
                        <div class="input-group-append">
                            <div class="input-group-text cursor-pointer">
                                <i data-feather="eye"></i>
                            </div>
                        </div>
                    </div>
                    @error('password') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="account-retype-new-password">Retype New Password</label>
                    <div class="input-group form-password-toggle input-group-merge">
                        <input wire:model='passwordConfirm' type="password" class="form-control" id="confirm-password" name="confirm-new-password" placeholder="New Password" />
                        <div class="input-group-append">
                            <div class="input-group-text cursor-pointer"><i data-feather="eye"></i></div>
                        </div>
                    </div>
                    @error('passwordConfirm') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary mr-1 mt-1">Save changes</button>
            </div>
        </div>
    </form>
</div>
