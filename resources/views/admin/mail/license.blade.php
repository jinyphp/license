<div>
    @if ($popupForm)
        <x-wire-dialog-modal wire:model="popupForm" :maxWidth="$popupWindowWidth">
            <x-slot name="title">
                {{ __('라이센스 메일 발송') }}
            </x-slot>

            <x-slot name="content">
                {{ $forms['email'] }} 로 라이센스 파일을 발송합니다.



                @if ($message)
                    <div class="alert alert-info" role="alert">
                        {{ $message }}
                    </div>
                @endif
            </x-slot>

            <x-slot name="footer">
                <div class="d-flex justify-content-between">
                    <div>
                        <div wire:loading wire:target="sendMail" class="flex items-center my-4">
                            <div class="relative w-32 h-2 bg-gray-200 rounded">
                                <div class="absolute top-0 left-0 h-full bg-blue-500 rounded animate-[loading_1s_ease-in-out_infinite]"></div>
                            </div>
                            <span class="ml-2">메일 발송중...</span>
                        </div>
                    </div>
                    <div class="flex justify-end space-x-2">
                        <button wire:click="$set('popupForm', false)" class="btn btn-secondary">
                            닫기
                        </button>

                        <button wire:click="sendMail" class="btn btn-primary">
                            발송
                        </button>
                    </div>
                </div>
            </x-slot>
        </x-wire-dialog-modal>
    @endif
</div>
