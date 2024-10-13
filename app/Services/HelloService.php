<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class HelloService 
{
    public function create_slug(string $message)
    {
        $slug = Str::slug($message);
        return $slug;
    }
}