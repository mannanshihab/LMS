<form wire:submit.prevent="submitFrom">
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
            'name' => 'description',
            'label' => 'Description',
            'type' => 'textarea',
            'placeholder' => 'Enter Description',
            'required' => 'required'
        ])
    </div>
    <div class="mb-6">
        @include('components.form-field', [
            'name' => 'price',
            'label' => 'Price',
            'type' => 'number',
            'placeholder' => 'Add Price',
            'required' => 'required'
        ])
    </div>
   
 
    <div class="mb-6">
        @include('components.wire-loading-btn')
    </div>
</form>
