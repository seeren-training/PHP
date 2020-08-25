<?php

session_start([
    "cache_limiter", "nocache",
    "cookie_httponly" => 1,
    "cookie_path" => "/",
    "use_cookies" => 1,
    "use_only_cookies" => 1,
    "use_strict_mode" => 1,
    "use_trans_sid" => 0,
]);

if (!array_key_exists("count", $_SESSION)) {
    $_SESSION["count"] = 0;
}

echo ++$_SESSION["count"];