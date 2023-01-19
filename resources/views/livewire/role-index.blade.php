<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2 text-left">Permissions</th>
            <th class="border px-4 py-2 ">Action</th>
        </tr>
        @foreach ( $roles as $role )
        <tr>
            <td class="border px-4 py-2">{{ $role->name }}</td>
            <td class="border px-4 py-2">
                @foreach ($role -> permissions as $permission )
                <span class="bg-green-500 text-white p-1 rounded-lg">{{ $permission-> name}}</span> 
                @endforeach
            </td>
            <td class="border px-4 py-2 flex items-center justify-center">
                <a href="{{route('role.edit', $role->id)}}" >
                    @include('components.icons.edit')
                </a>
                <form class="ml-1" wire:submit.prevent="roleDelete({{$role->id}})">
                    <button onclick="return confirm('Are you sure?');" type="submit" > 
                        @include('components.icons.trash')
                    </button>
                </form>
            </td> 
        </tr>
        @endforeach
    </table>
</div>

