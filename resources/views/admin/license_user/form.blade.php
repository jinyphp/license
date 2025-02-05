<div>
    <x-form-hor>
        <x-form-label>회사명</x-form-label>
        <x-form-item>
            {!! xInputText()
                ->setWire('model.defer',"forms.company")
                ->setWidth("standard")
            !!}
        </x-form-item>
    </x-form-hor>

    <x-form-hor>
        <x-form-label>이메일</x-form-label>
        <x-form-item>
            {!! xInputText()
                ->setWire('model.defer',"forms.email")
                ->setWidth("standard")
            !!}
        </x-form-item>
    </x-form-hor>

    <x-form-hor>
        <x-form-label>도메인</x-form-label>
        <x-form-item>
            {!! xInputText()
                ->setWire('model.defer',"forms.domain")
                ->setWidth("standard")
            !!}
        </x-form-item>
    </x-form-hor>
</div>
