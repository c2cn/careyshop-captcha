<?php

use think\Response;
use think\facade\Route;
use careyshop\captcha\facade\Captcha;

/**
 * @param string $config
 * @return Response
 */
function captcha($config = null): Response
{
    return Captcha::create($config);
}

/**
 * @param $config
 * @return string
 */
function captcha_src($config = null): string
{
    return Route::buildUrl('/captcha' . ($config ? "/{$config}" : ''));
}

/**
 * @param string $id
 * @param string $domid
 * @return string
 */
function captcha_img($id = '', $domid = ''): string
{
    $src = captcha_src($id);

    $domid = empty($domid) ? $domid : "id='" . $domid . "'";

    return "<img src='{$src}' alt='captcha' " . $domid . " onclick='this.src=\"{$src}?\"+Math.random();' />";
}

/**
 * @param string $value
 * @return bool
 */
function captcha_check($value)
{
    return Captcha::check($value);
}
