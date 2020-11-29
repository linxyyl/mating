<?php
/**
 * User: dirzzle
 * Email: linxyyl@163.com
 */

namespace linxyyl\mating;


class Mating
{

    const MAX_LENGTH = 1024;

    /**
     * 返回大写字符串
     * @param int $length
     * @return string
     */
    public static function upperString(int $length = 32)
    {
        $length = static::verifyLength($length);
        return strtoupper(substr(static::getLetters(), 0, $length));
    }

    /**
     * 返回小写字符串
     * @param int $length
     * @return string
     */
    public static function lowerString(int $length = 32)
    {
        $length = static::verifyLength($length);
        return strtolower(substr(static::getLetters(), 0, $length));
    }

    /**
     * 返回纯数字字符串
     * @param int $length
     * @return bool|string
     */
    public static function numberString(int $length = 32)
    {
        $length = static::verifyLength($length);
        return substr(static::getNumber(), 0, $length);
    }

    /**
     * 生成一个很长的字符串,可以用来制造垃圾
     * @param int $length
     * @return bool|string
     */
    public static function superString(int $length = 32)
    {
        if ($length > 9999) {
            $length = 9999;
        }

        return substr(static::getSuper(), 0, $length);
    }

    private static function verifyLength(int $length)
    {
        if ($length > static::MAX_LENGTH) {
            return static::MAX_LENGTH;
        } else {
            return $length;
        }
    }

    private static function getLetters()
    {
        $str = 'QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm';
        $letters = '';
        for ($i = 0; $i <= 50; $i++) {
            $letters .= str_shuffle($str);
        }
        return $letters;
    }

    private static function getNumber()
    {
        $str = '01234567899876543210';
        $letters = '';
        for ($i = 0; $i <= 100; $i++) {
            $letters .= str_shuffle($str);
        }
        return $letters;
    }

    /**
     * @param int $length
     * @return string
     */
    private static function getSuper()
    {

        $ele = [
            'ele_1 ' => md5(uniqid()),//32
            'ele_1 ' => strtoupper(uniqid()),//32
            'ele_2 ' => md5(microtime()),//32
            'ele_2 ' => strtoupper(md5(microtime())),//32
            'ele_3' => md5(uniqid()),//32
            'ele_3' => strtoupper(md5(uniqid())),//32
            'ele_4 ' => substr(str_shuffle('QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm'), 0, 32),//32
            'ele_6 ' => md5(str_shuffle('1234567890')),// 32
            'ele_7 ' => str_shuffle('[@$%*(=]!'),// 9
            'ele_8' => substr(password_hash(md5(uniqid()), PASSWORD_BCRYPT), 32), //32
        ];
        $str = '';
        $str1 = implode('', $ele);
        for ($i=0;$i<=20;$i++){
            $str.= str_shuffle($str1);
        }
        return $str;
    }
}
