<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5d2e8f997695149a45e1874e57b2efa7
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Mike42\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Mike42\\' => 
        array (
            0 => __DIR__ . '/..' . '/mike42/escpos-php/src/Mike42',
            1 => __DIR__ . '/..' . '/mike42/gfx-php/src/Mike42',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5d2e8f997695149a45e1874e57b2efa7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5d2e8f997695149a45e1874e57b2efa7::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
