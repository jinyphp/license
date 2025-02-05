<div>
    <x-form-hor>
        <x-form-label><a href="/admin/license/plan">플렌</a></x-form-label>
        <x-form-item>
            {{-- {!! xInputText()
                ->setWire('model.defer',"forms.title")
                ->setWidth("standard")
            !!} --}}
            {!! xSelect()
                ->table('license_plan','title')
                ->setWire('model.defer',"forms.title")
                ->setWidth("medium")
            !!}
        </x-form-item>
    </x-form-hor>

    <x-form-hor>
        <x-form-label><a href="/admin/license/user">이메일</a></x-form-label>
        <x-form-item>
            {!! xInputText()
                ->setWire('model.defer',"forms.email")
                ->setWidth("standard")
            !!}
            {{-- {!! xSelect()
                ->table('license_user','user_email')
                ->setWire('model.defer',"forms.email")
                ->setWidth("medium")
            !!} --}}
        </x-form-item>
    </x-form-hor>

    <x-form-hor>
        <x-form-label>Salt</x-form-label>
        <x-form-item>
            {!! xInputText()
                ->setWire('model.defer',"forms.salt")
                ->setWidth("standard")
            !!}
        </x-form-item>
    </x-form-hor>

    <x-form-hor>
        <x-form-label>라이센스(json)</x-form-label>
        <x-form-item>
            {!! xTextarea()
                ->setWire('model.defer',"forms.detail")
            !!}
        </x-form-item>
    </x-form-hor>

    <x-form-hor>
        <x-form-label>만료일자</x-form-label>
        <x-form-item>
            <input type="date"
                wire:model.defer="forms.expired_at"
                class="form-control"
                style="width:200px">
        </x-form-item>
    </x-form-hor>



</div>
