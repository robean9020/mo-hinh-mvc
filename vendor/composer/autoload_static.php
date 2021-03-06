<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8059b84db48751c7045ca7b94bb77ba0
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MyApp\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MyApp\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8059b84db48751c7045ca7b94bb77ba0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8059b84db48751c7045ca7b94bb77ba0::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
