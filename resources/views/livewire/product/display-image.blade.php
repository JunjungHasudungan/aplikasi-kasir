<div>
    <x-dialog-modal wire:model.live="modalDisplayProdctImage">
        <x-slot name="title">
            {{ __('Title') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Content') }}
        </x-slot>

        <x-slot name="footer">
            {{ __('Footer') }}
        </x-slot>
    </x-dialog-modal>
    
</div>
