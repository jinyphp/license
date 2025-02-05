<x-wire-table>
    <x-wire-thead>
        <th width='50'>Id</th>
        <th width='200'>domain</th>
        <th width='200'>회사명</th>
        <th>
            이메일
        </th>
        <th width='200'>plans</th>
        <th width='200'>등록일자</th>
    </x-wire-thead>
    <tbody>
        @if(!empty($rows))
            @foreach ($rows as $item)
            <x-wire-tbody-item :selected="$selected" :item="$item">
                {{-- 테이블 리스트 --}}
                <td width='50'>{{$item->id}}</td>
                <td width='200'>
                    {{$item->domain}}
                </td>
                <td width='200'>{{$item->company}}</td>
                <td >
                    {{-- {!! $popupEdit($item, $item->name) !!} --}}
                    <x-link-void wire:click="edit({{$item->id}})">
                        {{$item->email}}
                    </x-link-void>
                </td>
                <td width='200'>{{$item->plans}}</td>
                <td width='200'>{{$item->created_at}}</td>

            </x-wire-tbody-item>
            @endforeach
        @endif
    </tbody>
</x-wire-table>
