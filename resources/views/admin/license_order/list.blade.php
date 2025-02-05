<x-wire-table>
    <x-wire-thead>
        <th width='50'>Id</th>
        <th width='200'>이메일</th>
        <th >title</th>
        <th width='200'>type</th>
        <th width='200'>price</th>
        <th width='200'>플랜</th>
        <th width='200'>상태</th>
        <th width='200'>등록일자</th>
    </x-wire-thead>
    <tbody>
        @if(!empty($rows))
            @foreach ($rows as $item)
            <x-wire-tbody-item :selected="$selected" :item="$item">
                {{-- 테이블 리스트 --}}
                <td width='50'>{{$item->id}}</td>
                <td width='200'>
                    {{$item->email}}
                </td>
                <td >{{$item->title}}</td>
                <td width='200'>{{$item->type}}</td>
                <td width='200'>{{$item->price}}</td>
                <td width='200'>{{$item->plan_id}}</td>
                <td width='200'>{{$item->status}}</td>
                <td width='200'>{{$item->created_at}}</td>

            </x-wire-tbody-item>
            @endforeach
        @endif
    </tbody>
</x-wire-table>
