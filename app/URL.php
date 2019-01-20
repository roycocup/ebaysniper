<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class URL extends Model
{
    public function save(array $options = [])
    {
        $this->hash = URL::hashUrl($this->url);
        return parent::save($options);
    }

    /*
     * Get the last 10 characters for a md5 hash of a string
     */
    public function hashUrl(string $url)
    {
        $fullHash = md5($url);
        $sub = substr($fullHash, -10);
        return $sub;
    }
}
