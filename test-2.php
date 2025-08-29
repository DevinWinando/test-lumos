<?php

/**
 * Memisahkan string "nama-job,nama-job" menjadi array.
 * @param string $str
 * @return array
 */
function splitJobCharacters($str) {
    return array_map(function($item) {
        return explode('-', $item);
    }, explode(',', $str));
}

/**
 * Membalikkan string job (posisi ganjil: 1, 3, 5, ...)
 * @param array $arr
 * @return array
 */
function reverseJobCharacters($arr) {
    return array_map(function($item) {
        if (isset($item[1])) {
            $item[1] = strrev($item[1]);
        }
        return $item;
    }, $arr);
}

/**
 * Mendekripsi setiap huruf job ke huruf sebelumnya (a->z, b->a, dst)
 * @param array $arr
 * @return array
 */
function decryptJobCharacters($arr) {
    // (ex: i -> h, a -> z, d -> c, o -> n, s -> r, t -> s, z -> y)
    return $arr;
}

/**
 * Mengelompokkan data menjadi array 2 dimensi: [[nama, job], ...]
 * @param array $arr
 * @return array
 */
function makingDreamTeam($arr) {
    return array_map(function($item) {
        return [$item[0], $item[1]];
    }, $arr);
}

/**
 * Fungsi utama yang menggabungkan semua proses.
 * @param string $str
 * @return string
 */
function startUpMatchMaking($str) {
    $team = splitJobCharacters($str);
    $team = reverseJobCharacters($team);
    $team = decryptJobCharacters($team);
    $team = makingDreamTeam($team);

    if (count($team) < 3) {
        return "Minimum 3 members in the team";
    }

    // Check job composition
    $jobCounts = array_count_values(array_column($team, 1));
    if (count($jobCounts) < 3) {
        return "The job composition in the team is not suitable";
    }

    return "Match your Dream Start-Up Team";
}

// --- CONTOH PEMANGGILAN ---
echo startUpMatchMaking('idaz-sfmutvi,anggara-sfutqji,fika-sfldbi') . "<br>";
// // Match your Dream Start-Up Team

echo startUpMatchMaking('eko-sfldbi,fajrin-sfmutvi,abdullah-sfutqji,anggara-sfutqji') . "<br>";
// Match your Dream Start-Up Team

echo startUpMatchMaking('abdullah-sfldbi,fajrin-sfmutvi,samir-sfldbi,eko-sfmutvi,basil-sfmutvi') . "<br>";
// The job composition in the team is not suitable

echo startUpMatchMaking('samir-sfmutvi,basil-sfutqji,eko-sfmutvi') . "<br>";
// The job composition in the team is not suitable

echo startUpMatchMaking('samir-sfmutvi,basil-sfutqji') . "<br>";
// Minimum 3 members in the team