<div>
    <form wire:submit.prevent="submit" class="validate-form">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="accountTextarea"bio>Bio</label>
                    <textarea class="form-control" wire:model.defer='bio' id="accountTextarea" rows="4">{{ auth()->user()->bio }}</textarea>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="accountSelect">Jenis Kelamin</label>
                    <select class="form-control" id="accountSelect" wire:model.defer="gender">
                        <option value="l" {{ $gender == 'l' ? 'selected' : '' }}>Laki-Laki</option>
                        <option value="p" {{ $gender == 'p' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="pd-months-year">Date of birth</label>
                    <input type="text" wire:model.defer="dateofbirth" id="fp-default" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" />
                </div>
            </div>

            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="account-website">Age</label>
                    {{-- <input type="number" wire:model.defer="age" class="touchspin"/> --}}
                    <input type="number" wire:model.defer="age" class="form-control"/>
                    @error('age') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="account-phone">Phone</label>
                    <input type="number" wire:model.defer="phone" class="form-control" id="account-phone" placeholder="Phone number" value="(+656) 254 2568"  />
                    @error('phone') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="accountTextarea">Address</label>
                    <textarea class="form-control" wire:model.defer="address" id="accountTextarea" rows="2" placeholder="Your address..."></textarea>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary mt-1 mr-1">Save changes</button>
            </div>
        </div>
    </form>
</div>
