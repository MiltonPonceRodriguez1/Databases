<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebApp extends Model {
    use HasFactory;

    private $page_name;
    private $url;
    private $root_domain;
    private $hosting;
    private $metas;
    private $age;

    function __construct($page_name, $url, $root_domain, $hosting, $metas, $age) {
        $this->page_name = $page_name;
        $this->url = $url;
        $this->root_domain = $root_domain;
        $this->hosting = $hosting;
        $this->metas = $metas;
        $this->age = $age;
    }

    public function getPageName() {
        return $this->page_name;
    }

    public function getUrl() {
        return $this->url;
    }

    public function getRootDomain() {
        return $this->root_domain;
    }

    public function getHosting() {
        return $this->hosting;
    }

    public function getMetas() {
        return $this->metas;
    }

    public function getAge() {
        return $this->age;
    }
    
}
