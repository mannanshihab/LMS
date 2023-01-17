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
    <div class="mb-6">
        @include('components.form-field', [
            'name' => 'email',
            'label' => 'Email',
            'type' => 'email',
            'placeholder' => 'Enter email',
            'required' => 'required'
        ])
    </div>
    <div class="mb-6">
        @include('components.form-field', [
            'name' => 'phone',
            'label' => 'Phone',
            'type' => 'number',
            'placeholder' => 'Add Phone Number',
            'required' => 'required'
        ])
    </div>
    
    <div class="mb-6">
        @include('components.wire-loading-btn')
    </div>
</form>
