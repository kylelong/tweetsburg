<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit922402484813697d78b511965a3c343c
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Abraham\\TwitterOAuth\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Abraham\\TwitterOAuth\\' => 
        array (
            0 => __DIR__ . '/..' . '/abraham/twitteroauth/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit922402484813697d78b511965a3c343c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit922402484813697d78b511965a3c343c::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}