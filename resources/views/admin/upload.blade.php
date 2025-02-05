<div>
    <div class="row">
        @foreach($license as $i => $item)
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center gap-2">
                        <h3>{{$item['title']}}</h3>
                        @if(isset($item['domain']))
                            <span class="badge bg-secondary">{{$item['domain']}}</span>
                        @endif
                    </div>
                    <p>{{$item['description']}}</p>

                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <div>
                            만료일자: {{$item['license']['expired_at']}}
                        </div>
                        <div>
                            <button class="btn btn-danger" wire:click="remove({{$i}})">
                                제거
                            </button>

                            <button class="btn btn-primary" wire:click="renewal({{$i}})">
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
