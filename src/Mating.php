<?php
/**
 * User: dirzzle
 * Email: linxyyl@163.com
 */

namespace linxyyl\mating;


class Mating
{
    /**
     * @param int $length
     * @return string
     */
    public static  function getStr(int $length = 64): string
    {
        if ($length > 256) {
            $length = 256;
        }

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

        return substr(str_shuffle(implode('', $ele)), 0, $length);
    }
}