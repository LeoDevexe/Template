<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc81606715571a7f9fb6a429f9c70fc15
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Mysql\\Aplicacion\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Mysql\\Aplicacion\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitc81606715571a7f9fb6a429f9c70fc15::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc81606715571a7f9fb6a429f9c70fc15::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc81606715571a7f9fb6a429f9c70fc15::$classMap;

        }, null, ClassLoader::class);
    }
}
