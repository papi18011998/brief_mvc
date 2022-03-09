<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit95c6e16932b445403eec4cabd66b66f7
{
    public static $prefixLengthsPsr4 = array (
        'B' => 
        array (
            'Brief\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Brief\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit95c6e16932b445403eec4cabd66b66f7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit95c6e16932b445403eec4cabd66b66f7::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit95c6e16932b445403eec4cabd66b66f7::$classMap;

        }, null, ClassLoader::class);
    }
}
