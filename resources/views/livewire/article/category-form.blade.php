<div>
    <form wire:submit.prevent="saveCategory">
        <div class="modal-body">
            <div class="col-12">
                <div class="form-group mb-2">
                    <label for="blog-edit-title">Name</label>
                    <input type="text" wire:model="name" id="title" class="form-control">
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
