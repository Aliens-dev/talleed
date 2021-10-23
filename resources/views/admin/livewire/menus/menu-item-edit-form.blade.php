<td colspan="6" class="card p-5 mt-2">
    <div class="field is-grouped">
        <label for="title">اسم القائمة</label>
        <div class="control">
            <input id="title" class="input" wire:model.defer="menuItem.title" />
            @error('menuItem.title')
                <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>
        <label for="url">عنوان URL</label>
        <div class="control">
            <input id="url" class="input" wire:model.defer="menuItem.url" />
            @error('menuItem.name')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="field is-grouped">
            <div class="control">
                <button wire:click="editMenu()" class="button is-link">تعديل</button>
            </div>
            <div class="control">
                <button wire:click="cancelEdit()" class="button is-link is-light mr-2">الغاء</button>
            </div>
        </div>
    </div>
</td>
