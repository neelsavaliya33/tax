<div class="p-5">
    <x-jet-validation-errors class="mb-4" />
    <form wire:submit.prevent="inviteTexpayer()" class="grid grid-cols-2 gap-3">
        @csrf
        <div>
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" class="block mt-1 w-full" type="email" wire:model='email' required autofocus />
        </div>

        <div>
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" class="block mt-1 w-full" type="text" wire:model='name' required autofocus />
        </div>

        <x-jet-button class="mt-3 col-span-2 w-fit">
            {{ __('Invite') }}
        </x-jet-button>
    </form>
</div>
