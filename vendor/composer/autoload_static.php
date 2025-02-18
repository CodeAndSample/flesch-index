<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite75c926aaf6a7f34435e357c9be3377c
{
    public static $prefixLengthsPsr4 = array (
        'O' => 
        array (
            'Org_Heigl\\TextStatistics\\' => 25,
            'Org\\Heigl\\Hyphenator\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Org_Heigl\\TextStatistics\\' => 
        array (
            0 => __DIR__ . '/..' . '/org_heigl/textstatistics/src',
        ),
        'Org\\Heigl\\Hyphenator\\' => 
        array (
            0 => __DIR__ . '/..' . '/org_heigl/hyphenator/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite75c926aaf6a7f34435e357c9be3377c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite75c926aaf6a7f34435e357c9be3377c::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
