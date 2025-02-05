<div>
    <x-loading-indicator />

    {{-- 필터 --}}
    @includeIf('jiny-wire-table::table_popup_forms.filter')

    {{-- 메시지를 출력합니다. --}}
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif


    {{-- 외부에서 지정한 목록 테이블을 출력합니다. --}}
    @if (isset($actions['view']['list']))
        @includeIf($actions['view']['list'])
    @endif

    @if (empty($rows))
        <div class="text-center">
            검색된 데이터 목록이 없습니다.
        </div>
    @endif


    <div class="d-flex justify-content-between">
        <div class="px-2 py-2">
            전체 {{ count($ids) }} 개가 검색되었습니다.
        </div>
        <div>
            @if (isset($rows) && is_object($rows))
                @if (method_exists($rows, 'links'))
                    <div>{{ $rows->links() }}</div>
                @else
                @endif
            @else
            @endif
        </div>
    </div>





    <!-- 팝업 데이터 수정창 -->
    @if ($popupForm)
        @includeIf('jiny-wire-table::table_popup_forms.popup_forms')
    @endif

    {{-- 퍼미션 알람 --}}
    @if ($popupPermit)
        @include('jiny-wire-table::table_popup_forms.permit')
    @endif

</div>
