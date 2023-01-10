<form wire:submit.prevent="formSubmit">
    <div class="mb-6">
        @include('components.form-field', [
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text',
            'placeholder' => 'Enter name',
            'required' => 'required'
        ])
    </div>

    <h3 class="font-semibold">Permission</h3>
    <div class="flex flex-wrap -mx-4">
        @foreach ($permissions as $permission )
            <div class="w-1/3 px-4 mb-4">
                <label class="inline-flex items-center">
                    <input wire:model.lazy="SelectedPermissions" type="checkbox" class="form-checkbox" value="{{$permission ->name}}">
                    <span class="ml-2">{{$permission->name}}</span>
                </label>
            </div>
        @endforeach
        @error('SelectedPermissions')
        <div class="text-red-500 text-sm mt-2 ml-5 mb-3">{{ $message }}</div>
        @enderror
    </div>
    @include('components.wire-loading-btn')
</form>