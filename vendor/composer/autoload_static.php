<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit44046a999d6e157ed77783b5fa9c78dd
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'aop\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'aop\\' => 
        array (
            0 => __DIR__ . '/../..' . '/aop',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit44046a999d6e157ed77783b5fa9c78dd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit44046a999d6e157ed77783b5fa9c78dd::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit44046a999d6e157ed77783b5fa9c78dd::$classMap;

        }, null, ClassLoader::class);
    }
}
