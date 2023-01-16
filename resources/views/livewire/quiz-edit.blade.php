<div>
   <h2>Question</h2>
   <!-- list -->

   <form :wire.submit.prevent="addQuestion">
        <div class="mb-4">
            <label for="question" class="pb-10">Add Question</label>
            <select wire:model="question" class="lms-input" id="question" class="mb-4">
                @foreach($questions as $question)
                <option  value="{{$question->id}}">{{$question->name}}</option>
                @endforeach
            </select>
            @error('correct_answer')
            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p>
            @enderror
        </div>
   </form>
</div>
