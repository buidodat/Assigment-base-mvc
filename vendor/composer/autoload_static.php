<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7f432ebb8cadf7a20778b7b51128f893
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7f432ebb8cadf7a20778b7b51128f893::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7f432ebb8cadf7a20778b7b51128f893::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7f432ebb8cadf7a20778b7b51128f893::$classMap;

        }, null, ClassLoader::class);
    }
}
