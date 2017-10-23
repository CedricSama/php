<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit73fd30085dde1e79cc84be82474751ac
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'TODO\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'TODO\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit73fd30085dde1e79cc84be82474751ac::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit73fd30085dde1e79cc84be82474751ac::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}