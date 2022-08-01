<div class="p-5">
    <table class="table-auto w-full">
        <thead>
        <tr>
            <th class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400 text-left">
                No
            </th>
            <th class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400 text-left">
                Name
            </th>
            <th class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400 text-left">
                boarded
            </th>
            <th class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400 text-left">
                Action
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($taxpayers as $taxpayer)
            <tr>
                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $loop->index + 1 }}</td>
                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $taxpayer->name }}</td>
                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                    @if($taxpayer->boarded)
                        yes
                    @else
                        <x-jet-button wire:click="resendLink({{$taxpayer}})">
                            {{ __('Resend Link') }}
                        </x-jet-button>
                    @endif
                </td>
                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                    <x-jet-button wire:click="updateUser({{$taxpayer}})" >
                        {{ __(!$taxpayer->status ? 'active' : 'deactivate') }}
                    </x-jet-button>

                    <x-jet-button wire:click="deleteUser({{$taxpayer}})" >
                        {{ __('Delete') }}
                    </x-jet-button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
