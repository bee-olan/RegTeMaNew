<?php

declare(strict_types=1);

namespace App\Widget\Adminka\Matkas\ChildMatka;

use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class StatusWidget extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('paseka_matkas_childmatka_status', [$this, 'status'], ['needs_environment' => true, 'is_safe' => ['html']]),
        ];
    }

    public function status(Environment $twig, string $status): string
    {
        return $twig->render('widget/adminka/matkas/childmatka/status.html.twig', [
            'status' => $status
        ]);
    }
}
