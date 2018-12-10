<?php

namespace App\Entities;


use Illuminate\Support\Collection;

/** generic entity collection */
class EntityCollection extends Collection
{
    public $pageToken;

    public function setPageToken($token){
        $this->pageToken = $token;
        return $this;
    }
}