<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('User') }}
            </h2>
            <div class="flex items-center">
                <a href="{{ route('role.index')}}" class="lms-btn">Role</a>
                <a href="{{ route('user.create')}}" class="lms-btn"> Add User</a>
            </div>
            
        </div>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <livewire:user-index />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
