<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit117f06d08f37bb6e0bd57cdaeb980bfd
{
    public static $prefixesPsr0 = array (
        'J' => 
        array (
            'JaviManga\\InitDB\\' => 
            array (
                0 => __DIR__ . '/..' . '/javimanga/initdb/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit117f06d08f37bb6e0bd57cdaeb980bfd::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
