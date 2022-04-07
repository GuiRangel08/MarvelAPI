<x-jet-form-section submit="generateToken">
    <x-slot name="title">
        {{ __('Api Token') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Geração do Token para acesso à Api.') }}
    </x-slot>

    <x-slot name="form">

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="api_token" value="{{ __('Api Token') }}" />
            <x-jet-input id="api_token" type="text" disabled="disabled" value='asd' class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="api_token" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-button wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
