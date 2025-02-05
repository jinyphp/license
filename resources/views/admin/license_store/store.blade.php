<div>
    <div class="row">
        @foreach ($row as $item)
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">{{$item->title}}</h5>
                        <h6 class="card-subtitle text-muted">
                            {{$item->description}}
                        </h6>
                    </div>

                    <div class="card-body">
                        <a href="/modules/detail/{{$item->code}}"
                            class="btn btn-primary">
                            신청하기
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
