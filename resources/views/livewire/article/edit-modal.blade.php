<div wire:ignore.self class="modal fade modal-primary" id="edit-tags" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel160">New Tags</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="col-12">
                        <div class="form-group mb-2">
                            <label for="blog-edit-title">Name</label>
                            <input type="text" wire:model.defer="title" id="title" class="form-control">
                            @error('title') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" wire:click='saveEditTags({{ $tagId }})' class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
