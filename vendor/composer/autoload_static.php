<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite20df32aaa2289767f1e73ab78b4bc04
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite20df32aaa2289767f1e73ab78b4bc04::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite20df32aaa2289767f1e73ab78b4bc04::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite20df32aaa2289767f1e73ab78b4bc04::$classMap;

        }, null, ClassLoader::class);
    }
}
