<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit117f06d08f37bb6e0bd57cdaeb980bfd
{
    public static $prefixLengthsPsr4 = array (
        'J' => 
        array (
            'JaviMaga\\InitDB\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'JaviMaga\\InitDB\\' => 
        array (
            0 => __DIR__ . '/..' . '/javimanga/initdb/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit117f06d08f37bb6e0bd57cdaeb980bfd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit117f06d08f37bb6e0bd57cdaeb980bfd::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
