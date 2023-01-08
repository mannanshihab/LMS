<x-app-layout>
    <x-slot name="header">
    <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Role') }}
        </h2>
        <div class="flex items-center pl-10">
            <a href="{{ route('role.create')}}" class="lms-btn">Add Role</a>
        </div>
        
    </div>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <livewire:role-index />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
