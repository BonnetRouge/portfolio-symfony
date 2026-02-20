<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('highlight', [$this, 'highlightText'], ['is_safe' => ['html']]),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('greeting', [$this, 'generateGreeting']),
            new TwigFunction('confirmation_message', [$this, 'generateConfirmationMessage'], ['is_safe' => ['html']]),
        ];
    }

    public function highlightText(string $text): string
    {
        return '<mark style="background-color: yellow; padding: 2px 4px;">' . $text . '</mark>';
    }

    public function generateGreeting(?string $name = null): string
    {
        $hour = (int) date('H');
        
        if ($hour >= 5 && $hour < 12) {
            $moment = 'Bonjour';
            $emoji = '☀️';
        } elseif ($hour >= 12 && $hour < 18) {
            $moment = 'Bon après-midi';
            $emoji = '🌤️';
        } elseif ($hour >= 18 && $hour < 22) {
            $moment = 'Bonsoir';
            $emoji = '🌆';
        } else {
            $moment = 'Bonne nuit';
            $emoji = '🌙';
        }
        
        $greeting = $emoji . ' ' . $moment;
        if ($name) {
            $greeting .= ', ' . $name;
        }
        $greeting .= ' !';
        
        return $greeting;
    }

    public function generateConfirmationMessage(string $type = 'success'): string
    {
        $messages = [
            'success' => [
                'icon' => '✅',
                'text' => 'Merci pour votre message ! Nous vous répondrons dans les plus brefs délais.',
                'color' => '#28a745'
            ],
            'info' => [
                'icon' => 'ℹ️',
                'text' => 'Votre message a bien été reçu et est en cours de traitement.',
                'color' => '#17a2b8'
            ],
            'warning' => [                                                        
                'icon' => '⚠️',
                'text' => 'Attention : vérifiez bien vos informations avant d\'envoyer le formulaire.',
                'color' => '#ffc107'
            ]
        ];

        $message = $messages[$type] ?? $messages['success'];

        return sprintf(
            '<div class="confirmation-message" style="background-color: %s; color: white; padding: 1rem; border-radius: 5px; margin: 1rem 0;">
                <strong>%s %s</strong>
            </div>',
            $message['color'],
            $message['icon'],
            $message['text']
        );
    }
}