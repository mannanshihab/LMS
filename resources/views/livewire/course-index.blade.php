<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2 text-left">Description</th>
            <th class="border px-4 py-2 text-left">Price</th>
           
            <th class="border px-4 py-2 ">Action</th>
        </tr>
        @foreach ( $courses as $course )
        <tr>
            <td class="border px-4 py-2">{{ $course->name }}</td>
            <td class="border px-4 py-2">{{ $course->description }}</td>
            <td class="border px-4 py-2">{{ $course->price }}</td>
           
            <td class="border px-4 py-2 flex items-center justify-center">
                <a href="{{route('course.edit', $course->id)}}" >
                    @include('components.icons.edit')
                </a>
                <a href="{{route('course.show', $course->id)}}" class="px-4">
                    @include('components.icons.view')
                </a>
                <form class="ml-1" onsubmit="return confirm('Are you sure?');" wire:submit.prevent="courseDelete({$course->id}})">
                    <button type="submit">
                        @include('components.icons.trash')
                    </button>
                </form>
            </td> 
        </tr>
        @endforeach
    </table>
    <div class="mt-5">
    {{ $courses->links() }}
    </div>
</div>

