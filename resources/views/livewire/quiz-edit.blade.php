<div>
   <h2 class="font-bold mb-3">Question</h2>
    <!-- list -->
    <ul class="list-desc mb-2">
        @foreach ($quiz->questions as $question )
        <li class="mb-5">{{$question->id}}.{{$question->name}}</li>
        @endforeach
    </ul>
    @if (count($questions)  > 0)
   <form wire:submit.prevent="addQuestion">
        <div class="mb-4">
            <label for="question" class="font-bold mb-3">Add Question</label>
            <select class="lms-input mt-5 mb-4"  
                    wire:model="question_id" 
                    id="question_id">
                <option  value="Select">Select</option>
                @foreach($questions as $question)
                <option  value="{{ $question->id }}"> {{ $question->name }}</option>
                @endforeach
            </select>
                @error('correct_answer')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p>
                @enderror
        </div>
        <div class="mb-6">
            @include('components.wire-loading-btn')
        </div>
   </form>
    @else
    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
        Question are not avileable .
    </p>
    @endif
</div>
