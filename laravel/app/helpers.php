<?php
use Illuminate\Support\Str;
if (!function_exists('showProductImage')) {
    function showProductImage($img_url)
    {
        if (Str::contains($img_url, 'http')){

           return $img_url;
        }

       	return ('/storage/products/' .$img_url);
    }
}
if (!function_exists('showCartQuantity')) {
    function showCartQuantity()
    {
        $sessionData = session('cart');
        $quantity = 0;

        if ($sessionData) {
            $quantity = count($sessionData);
        }

        return $quantity;
    }
}
function randString($length)
{
    $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $str = '';
    $size = strlen($chars);
    for ($i=0; $i<$length ; $i++) {
        $str .=$chars[rand(0, $size - 1)];
    }
    return $str;
}
?>