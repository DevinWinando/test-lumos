<?php

class LRUCache
{
    private $capacity;
    private $cache;

    public function __construct($capacity)
    {
        $this->capacity = $capacity;
        $this->cache = [];
    }

    public function get($key)
    {
        if (array_key_exists($key, $this->cache)) {
            return $this->cache[$key];
        }

        return null;
    }

    public function put($key, $value)
    {
        if (array_key_exists($key, $this->cache)) {
            $this->cache[$key] = $value;
        } else {
            if (count($this->cache) >= $this->capacity) {
                array_shift($this->cache);
            }

            $this->cache[$key] = $value;
        }

        return null;
    }
}

$cache = new LRUCache(2);

$cache->put(1, 1);
$cache->put(2, 2);

var_dump($cache->get(1));
echo "<br>";

$cache->put(3, 3);

var_dump($cache->get(2));
echo "<br>";
