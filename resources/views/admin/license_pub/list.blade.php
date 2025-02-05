<x-wire-table>
    <x-wire-thead>
        <th width='50'>Id</th>
        <th width='200'>도메인</th>
        <th>
            타이틀
        </th>
        <th width='200'>Salt</th>
        <th width='200'>만료일자</th>
    </x-wire-thead>
    <tbody>
        @if(!empty($rows))
            @foreach ($rows as $item)
            <x-wire-tbody-item :selected="$selected" :item="$item">
                {{-- 테이블 리스트 --}}
                <td width='50'>{{$item->id}}</td>
                <td width='200'>
                    <div>{{$item->domain}}</div>
                    <div>
                        <button class="btn btn-sm btn-primary"
                            wire:click="sendEmail({{$item->id}})">
                            {{$item->email}} 발송
                        </button>
                    </div>
                </td>
                <td >
                    {{-- {!! $popupEdit($item, $item->name) !!} --}}
                    <x-link-void wire:click="edit({{$item->id}})">
                        {{$item->title}}
                    </x-link-void>
                    <p>{{$item->description}}</p>
                </td>
                <td width='200'>{{$item->salt}}</td>
                <td width='200'>{{$item->expired_at}}</td>
            </x-wire-tbody-item>
            @endforeach
        @endif
    </tbody>
</x-wire-table>
