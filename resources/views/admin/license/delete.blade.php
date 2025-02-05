<div class="container">
    <x-wire-dialog-modal wire:model="popupDelete" :maxWidth="$popupWindowWidth">
        <x-slot name="title">
            {{ __('라이센스 삭제') }}
        </x-slot>

        <x-slot name="content">
            라이센스 삭제 확인
            {{$message}}
        </x-slot>

        <x-slot name="footer">
            <div class="flex justify-end space-x-2">
                <button wire:click="$set('popupForm', false)" class="btn btn-secondary">
                    닫기
                </button>

                @if(isset($forms['id']))
                <button wire:click="removeConfirm('{{ $forms['id'] }}')" class="btn btn-danger">
                    삭제
                </button>
                @endif
            </div>
        </x-slot>
    </x-wire-dialog-modal>
</div>
