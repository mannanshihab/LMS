<div>
    @foreach ( $questions as  $question )
    <div class="m-3 bg-gray-100 rounded p-3">
        <div class="flex">
            <h2 class="text-black">
                <span>({{ $question -> id }}).</span>  {{  $question -> name }}
            </h2>
            <p class="flex ml-10">
                <a href="{{ route('question.edit', $question->id) }}">
                    @include('components.icons.edit')
                </a>
                <form wire:submit.prevent="questionDelete({{ $question->id }})">
                    <button onclick="return confirm('Are you sure?');" type="submit" > 
                        @include('components.icons.trash')
                    </button>
                </form>
            </p>
        </div>
       
        <div class="flex">
            <span class="m-5">a) {{  $question -> answer_a }}</span>
            <span class="m-5">b) {{  $question -> answer_b }}</span>
            <span class="m-5">c) {{  $question -> answer_c }}</span>
            <span class="m-5">d) {{  $question -> answer_d }}</span>
        </div>
        <p class="text-black">
            Correct Answer : <span class="text-green-700 bold text-2xl"> 
                {{  $question -> correct_answer }}
            </span> 
        </p>
    </div>
    @endforeach
    <div class="mt-3 p-3">
        {{ $questions->links() }}
    </div>
</div>
