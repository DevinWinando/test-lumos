<?php

class Solution
{
    function isValid($s) {
        $arr = [];
        $data = [
            ')' => '(',
            ']' => '[',
            '}' => '{'
        ];

        for ($i = 0; $i < strlen($s); $i++) {
            $char = $s[$i];

            // Jika karakter adalah tanda buka
            if (in_array($char, $data)) {
                // Tambahkan ke array
                array_push($arr, $char);
            } elseif (isset($data[$char])) {
                // Jika karakter adalah tanda tutup
                // Cari pasangan yang sesuai berdasarkan array dalam data
                // Lalu hapus char tersebut.
                // Jika tidak ada pasangan yang sesuai
                // Hasilnya false
                if (empty($arr) || array_pop($arr) !== $data[$char]) {
                    return false;
                }
            }
        }

        return empty($arr);
    }
}

$solution = new Solution();

var_dump($solution->isValid("()")); // true
var_dump($solution->isValid("()[]{}")); // true
var_dump($solution->isValid("(]")); // false
var_dump($solution->isValid("([])")); // true
var_dump($solution->isValid("([)]")); // false
var_dump($solution->isValid("{[]}")); // true
var_dump($solution->isValid("")); // true (tapi input minimal 1 karakter)

var_dump($solution->isValid("(((")); // false
var_dump($solution->isValid(")))")); // false
var_dump($solution->isValid("([{}])")); // true
