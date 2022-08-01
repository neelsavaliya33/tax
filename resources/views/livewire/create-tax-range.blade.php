<div class="p-5">
    <x-jet-validation-errors class="mb-4" />
    <form wire:submit.prevent="create()" class="grid grid-cols-2 gap-3">
        @csrf
        <div>
            <x-jet-label for="range_from" value="{{ __('Amount start') }}" />
            <x-jet-input id="range_from" disabled re class="block mt-1 w-full" type="text" value="{{$range_from}}" required autofocus />
        </div>

        <div>
            <x-jet-label for="name" value="{{ __('Amount end') }}" />
            <x-jet-input id="name" class="block mt-1 w-full" type="text" wire:model='range_to' required autofocus />
        </div>

        <div>
            <x-jet-label for="name" value="{{ __('tax') }}" />
            <x-jet-input id="name" class="block mt-1 w-full" type="text" wire:model='tax' required autofocus />
        </div>

        <x-jet-button class="mt-3 col-span-2 w-fit">
            {{ __('Create') }}
        </x-jet-button>
    </form>
</div>
