<div>
    <form class="validate-form" wire:submit.prevent='submit'>
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center mb-2">
                    <i data-feather="link" class="font-medium-3"></i>
                    <h4 class="mb-0 ml-75">Social Links</h4>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="account-twitter">Twitter</label>
                    <input type="text" wire:model.prefer='twitter' id="account-twitter" class="form-control" placeholder="Add link" />
                    @error('twitter')
                        <div class="demo-spacing-0">
                            <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                <div class="alert-body">
                                    <i data-feather="info" class="mr-50 align-middle"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            </div>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="account-facebook">Facebook</label>
                    <input type="text" wire:model.prefer='facebook' id="account-facebook" class="form-control" placeholder="Add link" />
                    @error('facebook')
                        <div class="demo-spacing-0">
                            <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                <div class="alert-body">
                                    <i data-feather="info" class="mr-50 align-middle"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            </div>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="account-google">Instagram</label>
                    <input type="text" wire:model.prefer='instagram' id="account-google" class="form-control" placeholder="Add link" />
                    @error('instagram')
                        <div class="demo-spacing-0">
                            <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                <div class="alert-body">
                                    <i data-feather="info" class="mr-50 align-middle"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            </div>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="account-instagram">Youtube</label>
                    <input type="text" wire:model.prefer='youtube' id="account-instagram" class="form-control" placeholder="Add link" />
                    @error('youtube')
                        <div class="demo-spacing-0">
                            <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                <div class="alert-body">
                                    <i data-feather="info" class="mr-50 align-middle"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            </div>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="account-linkedin">LinkedIn</label>
                    <input type="text" wire:model.prefer='linkedin' id="account-linkedin" class="form-control" placeholder="Add link" />
                    @error('linkedin')
                        <div class="demo-spacing-0">
                            <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                <div class="alert-body">
                                    <i data-feather="info" class="mr-50 align-middle"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            </div>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="account-quora">Tiktok</label>
                    <input type="text" wire:model.prefer='tiktok' id="account-quora" class="form-control" placeholder="Add link" />
                    @error('tiktok')
                        <div class="demo-spacing-0">
                            <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                <div class="alert-body">
                                    <i data-feather="info" class="mr-50 align-middle"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            </div>
                        </div>
                    @enderror
                </div>
            </div>

            <div class="col-12">
                <hr class="my-2" />
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary mr-1 mt-1">Save changes</button>
                <button type="reset" class="btn btn-outline-secondary mt-1">Reset</button>
            </div>
        </div>
    </form>
</div>
