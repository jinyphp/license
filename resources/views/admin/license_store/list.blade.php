<div class="row">
    @foreach ($rows as $item)
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <x-link-void wire:click="edit({{$item->id}})">
                        {{$item->title}}
                    </x-link-void>
                </h5>
                <p class="card-text">
                    {{$item->description}}
                </p>
            </div>
        </div>
    </div>
    @endforeach
</div>

