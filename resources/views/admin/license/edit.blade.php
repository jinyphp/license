<div class="container">
    <x-wire-dialog-modal wire:model="popupForm" :maxWidth="$popupWindowWidth">
        <x-slot name="title">
            {{ __('라이센스') }}
        </x-slot>

        <x-slot name="content">
            @includeIf('jiny-license::admin.license.form')

            <p class="text-red-500">
                {{ $message }}
            </p>

        </x-slot>

        <x-slot name="footer">
            <div class="flex justify-end space-x-2">
                <button wire:click="$set('popupForm', false)" class="btn btn-secondary">
                    닫기
                </button>

                @if(isset($forms['id']))
                <button wire:click="update('{{ $forms['id'] }}')" class="btn btn-primary">
                    수정
                </button>
                @else
                <button wire:click="store" class="btn btn-primary">
                    등록
                </button>
                @endif
            </div>
        </x-slot>
    </x-wire-dialog-modal>
</div>
