<td colspan="6" class="card p-5 mt-2">
    <div class="field is-grouped">
        <label for="name">الكلمة المفتاحية</label>
        <div class="control">
            <input id="name" class="input" wire:model.defer="tag.name" />
            @error('tag.name')
                <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="field is-grouped">
            <div class="control">
                <button wire:click="editTag()" class="button is-link">تعديل</button>
            </div>
            <div class="control">
                <button wire:click="cancelEdit()" class="button is-link is-light mr-2">الغاء</button>
            </div>
        </div>
    </div>
</td>
