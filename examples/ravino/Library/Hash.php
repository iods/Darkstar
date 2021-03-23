namespace artbyrab\blockee;

/**
* Hash
*
* A mostly static library to ensure consistent hashing methods across the
* library.
*
* This class should be used when you want to hash a string or an object. It
* will provide uniform methods that ensure we hash in a consistent fashion
* across the whole library and maintain some integrity.
*
* @author artbyrab
*/
class Hash
{
/**
* String hash
*
* This is used for hashing a string.
*
* @param string $string
* @return string The hash of the string.
*/
public static function stringHash($string)
{
return md5($string);
}
}
