<td colspan="6" class="card p-5 mt-2">
    <div class="field is-grouped">
        <label for="name">المجال</label>
        <div class="control">
            <input id="name" class="input" wire:model.defer="category.name" />
            @error('category.name')
                <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mr-2 ml-2"></div>
        <label for="slug">عنوان المجال</label>
        <div class="control">
            <input id="slug" class="input" wire:model.defer="category.slug" />
            @error('category.slug')
                <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="field is-grouped">
            <div class="control">
                <button wire:click="editCategory()" class="button is-link">تعديل</button>
            </div>
            <div class="control">
                <button wire:click="cancelEdit()" class="button is-link is-light mr-2">الغاء</button>
            </div>
        </div>
    </div>
</td>
