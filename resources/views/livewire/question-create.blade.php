<form wire:submit.prevent="formSubmit">
    <div class="mb-6">
        @include('components.form-field', [
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text',
            'placeholder' => 'Type your Question',
            'required' => 'required'
        ])
    </div>
    @foreach ($answers as $answer )
        <div class="mb-6">
            @include('components.form-field', [
                'name' => 'answer_'.$answer,
                'label' => 'Answer '. ucfirst($answer),
                'type' => 'text',
                'placeholder' => 'Answer '. ucfirst($answer),
                'required' => 'required'
            ])
        </div>
    @endforeach

    <div class="mb-4">
        <label class="lms-label" for="correct_answer">Correct answer</label>
        <select class="lms-input" wire:model.prevent="correct_answer" id="correct_answer">
            <option value="Select">Select</option>
            @foreach($answers as $answer)
            <option value="{{ $answer }}">{{ ucfirst($answer) }}</option>
            @endforeach
        </select>
    </div>
    
    <div class="mb-6">
        @include('components.wire-loading-btn')
    </div>
</form>
