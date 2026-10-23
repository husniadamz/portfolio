<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class PortfolioPagesTest extends TestCase
{
    /**
     * @return array<string, array{0: string, 1: string}>
     */
    public static function pageProvider(): array
    {
        return [
            'home' => ['/', 'Hi, I'],
            'about' => ['/about', 'Engineering with purpose'],
            'focus' => ['/focus', 'What I do'],
            'stack' => ['/stack', 'Tools I use'],
            'contact' => ['/contact', 'Let'],
        ];
    }

    #[DataProvider('pageProvider')]
    public function test_each_portfolio_page_renders(string $uri, string $expectedText): void
    {
        $this->get($uri)
            ->assertOk()
            ->assertSee($expectedText, false)
            ->assertSee('ProtectHealth');
    }

    public function test_navigation_links_to_each_separate_page(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee(route('about'), false)
            ->assertSee(route('focus'), false)
            ->assertSee(route('stack'), false)
            ->assertSee(route('contact'), false);
    }
}
