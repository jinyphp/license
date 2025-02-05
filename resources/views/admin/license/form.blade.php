<div>
    <x-form-hor>
        <x-form-label>암호키</x-form-label>
        <x-form-item>
            {!! xInputText()
                ->setWire('model.defer',"forms.salt")
                ->setWidth("standard")
            !!}
        </x-form-item>
    </x-form-hor>

    <x-form-hor>
        <x-form-label>라이센스</x-form-label>
        <x-form-item>
            <input type="file" class="form-control"
                wire:model="uploadFile">
        </x-form-item>
    </x-form-hor>


</div>
