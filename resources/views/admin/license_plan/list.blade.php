<x-wire-table>
    <x-wire-thead>
        <th width='50'>Id</th>
        <th width='200'>code</th>
        <th>
            타이틀
        </th>
        <th width='200'>타입</th>
        <th width='200'>단가</th>
        <th width='200'>단위</th>
    </x-wire-thead>
    <tbody>
        @if(!empty($rows))
            @foreach ($rows as $item)
            <x-wire-tbody-item :selected="$selected" :item="$item">
                {{-- 테이블 리스트 --}}
                <td width='50'>{{$item->id}}</td>
                <td width='200'>
                    {{$item->code}}

                </td>
                <td >
                    {{-- {!! $popupEdit($item, $item->name) !!} --}}
                    <x-link-void wire:click="edit({{$item->id}})">
                        {{$item->title}}
                    </x-link-void>
                    <p>{{$item->description}}</p>
                </td>
                <td width='200'>{{$item->type}}</td>
                <td width='200'>{{$item->price}}</td>
                <td width='200'>{{$item->unit}}</td>
            </x-wire-tbody-item>
            @endforeach
        @endif
    </tbody>
</x-wire-table>
