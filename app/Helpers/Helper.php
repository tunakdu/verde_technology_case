<?php

/* Response helper */
if (!function_exists("rj")) {
    function rj($type, $message, $extra = null,$status=200): \Illuminate\Http\JsonResponse
    {
        $arr = ['status' => (bool)$type, 'message' => $message];
        if (is_array($extra)) {
            if(count($extra))
                $arr = array_merge($arr, $extra);
        }
        return response()->json($arr,$status);
    }
}
