<?php declare(strict_types=1);
/**
 * This file is part of the Darkstar PHP SDK.
 *
 * @version v0.1.0 Initial Release
 * @license The MIT License, http://opensource.org/licenses/MIT
 *
 * @filesource
 */
namespace Darkstar\Ravino;

use Tuupola\Base58;

class Util
{
    public static function doubleSHA256(string $hex): string
    {
        return hash('sha256', hash('sha256', hex2bin($hex), true));
    }

    public static function doubleSHA256InputString(string $input): string
    {
        return hash('sha256', hash('sha256', $input, true));
    }

    public static function toSHA256(string $hex): string
    {
        return hash('sha256', hex2bin($hex));
    }

    public static function toRipemd160(string $hex): string
    {
        return hash('ripemd160', hex2bin($hex));
    }

    public static function toBase58(string $hex): string
    {
        $base58 = new Base58(['characters' => Base58::BITCOIN]);
        return $base58->encode(hex2bin($hex));
    }

    public static function dd($input): void
    {
        var_dump($input);
        die();
    }

    public static function breakLine(): void
    {
        echo '<br/>';
        echo '<br/>';
        echo '<br/>';
        echo '<br/>';
        echo '<br/>';
    }
}
