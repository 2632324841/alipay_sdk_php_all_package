<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit44046a999d6e157ed77783b5fa9c78dd
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit44046a999d6e157ed77783b5fa9c78dd', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit44046a999d6e157ed77783b5fa9c78dd', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit44046a999d6e157ed77783b5fa9c78dd::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
