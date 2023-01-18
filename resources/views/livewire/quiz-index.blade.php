
<div class="table w-full mx-auto p-2">
    <table class="w-full border">
        <thead>
            <tr class="border px-4 py-2 text-center bg-gray-400">
                <th class="p-2 border-r cursor-pointer" >Quiz Name</div>
                </th>
                <th class="p-2 border-r cursor-pointer ">
                    <div class="flex items-center justify-center"> Action</div>
                </th>
            </tr>
        </thead>

        <tbody>
        @foreach($quizzes as $quiz)
            <tr class="text-center">
                <td class="border px-4 py-2 text-center">{{$quiz->name}}</td>
                <td class="border px-4 py-2 text-center">
                    <div class="flex items-center justify-center">
                        <a href="{{route('quiz.edit',$quiz->id)}}" class="ml-2 pt-2">
                            @include('components.icons.edit')
                        </a>
                        <a href="{{route('quiz.show',$quiz->id)}}" class="ml-2 pt-2">
                            @include('components.icons.view')
                        </a>
                        <form class="ml-2 pt-3" wire:submit.prevent="deleteQuiz({{$quiz->id}})">
                            <button onclick="return confirm('Are you sure?');" type="submit" > 
                                @include('components.icons.trash')
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{$quizzes->links()}}
    </div>
</div>

