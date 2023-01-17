<div>
   <h2 class="font-bold mb-3">Question</h2>
    <!-- list -->
    <ul class="list-desc mb-2">
        @foreach ($questions as $question )
        <li class="mb-5">{{$question->id}}.{{$question->name}}</li>
        @endforeach
    </ul>
   <form wire:submit.prevent="addQuestion">
        <div class="mb-4">
            <label for="question" class="font-bold mb-3">Add Question</label>
            <select wire:model="question" class="lms-input mt-5" id="question" class="mb-4">
                @foreach($questions as $question)
                <option  value="{{$question->id}}">{{$question->name}}</option>
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
</div>
