<?php

declare(strict_types=1);

namespace App\Model\Adminka\UseCase\PcheloMatkas\ChildPchelos\Files\Add;

class File
{
    public $path;
    public $name;
    public $size;

    public function __construct(string $path, string $name, int $size)
    {
        $this->path = $path;
        $this->name = $name;
        $this->size = $size;
    }
}
