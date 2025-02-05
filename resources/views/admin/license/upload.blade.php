<div>
    <div class="row">

        @foreach($license as $i => $item)
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    {{$item->code}}
                    <h5 class="card-title">{{$item->title}}</h5>
                    <h6 class="card-subtitle text-muted">
                        {{$item->description}}
                    </h6>
                </div>

                <div class="card-body">
                    {{$item->license}}
                </div>

                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <div>
                            만료일자: {{$item->expired_at}}
                        </div>
                        <div>
                            <button class="btn btn-danger" wire:click="remove({{$item->id}})">
                                제거
                            </button>

                            <button class="btn btn-primary" wire:click="renewal({{$item->id}})">
                                연장
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @endforeach

        <div class="col-md-4">
            <button class="btn btn-primary" wire:click="create">
                라이센스 추가
            </button>
        </div>
    </div>




    @if ($popupForm)
        @includeIf('jiny-license::admin.license.edit')
    @endif

    @if ($popupDelete)
        @includeIf('jiny-license::admin.license.delete')
    @endif
</div>
