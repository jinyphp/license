<?php

function getLicense($key=null) {
    if($key) {
        // 라이센스 키 체크
        $path = config_path('jiny/license/');
        if(file_exists($path."/".$key.'.json')) {
            $license = json_decode(
                file_get_contents($path."/".$key.'.json'),
            true);

            return $license;
        }
    }

    return false;
}
