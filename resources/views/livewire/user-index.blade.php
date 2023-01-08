<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2 text-left">Email</th>
            
            <th class="border px-4 py-2">Ragistred</th>
            <th class="border px-4 py-2 ">Action</th>
        </tr>
        @foreach ( $users as $user )
        <tr>
            <td class="border px-4 py-2">{{ $user->name }}</td>
            <td class="border px-4 py-2">{{ $user->email }}</td>
            
            <td class="border px-4 py-2 text-center">{{ date('F, j , Y', strtotime($user->created_at)) }}</td>
            <td class="border px-4 py-2 flex items-center justify-center">
                <a href="{{route('user.edit', $user->id)}}" >
                    @include('components.icons.edit')
                </a>
                <a href="{{route('user.show', $user->id)}}" class="px-4">
                    @include('components.icons.view')
                </a>
                <form class="ml-1" onsubmit="return confirm('Are you sure?');" wire:submit.prevent="userDelete({{$user->id}})">
                    <button type="submit">
                        @include('components.icons.trash')
                    </button>
                </form>
            </td> 
        </tr>
        @endforeach
    </table>
    <div class="mt-5">
    {{ $users->links() }}
    </div>
</div>
