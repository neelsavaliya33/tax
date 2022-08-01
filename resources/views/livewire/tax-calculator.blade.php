<div class="p-5">
    <x-jet-validation-errors class="mb-4" />
    <form wire:submit.prevent="calculateTax()" class="grid grid-cols-2 gap-3 items-center">
        @csrf
        <div>
            <x-jet-label for="earning" value="{{ __('Earning') }}" />
            <x-jet-input id="earning" class="block mt-1 w-full" type="text" wire:model='earning' required autofocus />
        </div>

        <div>
            <h2>Total Tax : {{$tax}}</h2>
        </div>

        <x-jet-button class="mt-3 col-span-2 w-fit">
            {{ __('Calculate') }}
        </x-jet-button>
    </form>
</div>
