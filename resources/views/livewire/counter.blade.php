<div>
    <div class="container flex mx-auto">
        <button wire:click="increase" 
            class="bg-green-500 text-white font-bold rounded-lg ml-5 p-2">
            +
        </button>
        <p class="text-red-500 m-5 font-bold">Livewire Counter : {{$count}}</p>
        <button wire:click="dec" 
            class="bg-red-500 text-white font-bold rounded-lg ml-5 p-2">
            -
        </button>
    </div>
</div>