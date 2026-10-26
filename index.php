<?php

require __DIR__ . '/includes/helpers.php';

$icons = require __DIR__ . '/includes/icons.php';

// W3Techs and Packagist, 24 Oct 2026
$stats = [
    ['69.3%', 'of websites with a known server-side language run PHP'],
    ['39.6%', 'of all websites are built with WordPress'],
    ['475,000+', 'open source packages on Packagist'],
    ['207B', 'package installs with Composer since 2012'],
];

// Verified 2026-10-25: Wikimedia and Flickr run PHP (own engineering sources), nasa.gov runs WordPress (WP VIP case study), Deezer's backend is PHP (engineering blog).
$poweredBy = ['wikipedia' => 'Wikipedia', 'nasa' => 'NASA', 'wordpress' => 'WordPress.com', 'etsy' => 'Etsy', 'tumblr' => 'Tumblr', 'flickr' => 'Flickr', 'deezer' => 'Deezer'];

// Key Features cards. Each links to its page in the PHP manual, or to its section of the 8.6 migration guide.
$features = [
    'partial-function-application' => [
        'title' => 'Partial Function Application',
        'icon' => '<path d="M12.828 6.00096C12.9388 5.68791 12.999 5.35099 12.999 5C12.999 3.34315 11.6559 2 9.99904 2C8.34219 2 6.99904 3.34315 6.99904 5C6.99904 5.35099 7.05932 5.68791 7.17008 6.00096C4.88532 6.0093 3.66601 6.09039 2.87772 6.87868C2.08951 7.66689 2.00836 8.88603 2 11.1704C2.31251 11.06 2.64876 11 2.99904 11C4.6559 11 5.99904 12.3431 5.99904 14C5.99904 15.6569 4.6559 17 2.99904 17C2.64876 17 2.31251 16.94 2 16.8296C2.00836 19.114 2.08951 20.3331 2.87772 21.1213C3.66593 21.9095 4.88508 21.9907 7.16941 21.999C7.05908 21.6865 6.99904 21.3503 6.99904 21C6.99904 19.3431 8.34219 18 9.99904 18C11.6559 18 12.999 19.3431 12.999 21C12.999 21.3503 12.939 21.6865 12.8287 21.999C15.113 21.9907 16.3322 21.9095 17.1204 21.1213C17.9086 20.333 17.9897 19.1137 17.9981 16.829C18.3111 16.9397 18.648 17 18.999 17C20.6559 17 21.999 15.6569 21.999 14C21.999 12.3431 20.6559 11 18.999 11C18.648 11 18.3111 11.0603 17.9981 11.171C17.9897 8.88627 17.9086 7.66697 17.1204 6.87868C16.3321 6.09039 15.1128 6.0093 12.828 6.00096Z" stroke="currentColor" stroke-linejoin="round" stroke-width="1.5" />',
        'snippet' => <<<'PHP'
            str_replace('hello', 'hi', ?)
            PHP,
        'summary' => 'Use <code>?</code> and <code>...</code> placeholders to turn any function call into a closure, perfect for <code>array_map()</code> and the pipe operator.',
        'docs' => 'https://www.php.net/manual/en/migration86.new-features.php#migration86.new-features.core.partial-function-application',
    ],
    'clamp' => [
        'title' => 'clamp() Function',
        'icon' => '<path d="M6.50232 13.2635C7.34673 13.2515 10.1432 12.6706 10.7361 13.2635C11.329 13.8564 10.7481 16.6529 10.7361 17.4973M13.2685 6.49733C13.2565 7.34173 12.6756 10.1382 13.2685 10.7311C13.8614 11.324 16.6579 10.7431 17.5023 10.7311M20.9991 2.99902L13.6103 10.3812M10.3691 13.6237L3 21.001" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />',
        'snippet' => <<<'PHP'
            clamp($percentage, min: 0, max: 100)
            PHP,
        'summary' => 'The new <code>clamp()</code> function keeps a value within a range, and throws a <code>ValueError</code> when the range itself is invalid.',
        'docs' => 'https://www.php.net/manual/en/function.clamp.php',
    ],
    'duration-class' => [
        'title' => 'Duration Class',
        'icon' => '<path d="M15 2H10" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" /><path d="M4 13.5C4 8.80558 7.80558 5 12.5 5C14.8472 5 16.9722 5.95139 18.5104 7.48959M18.5104 7.48959C20.0486 9.02779 21 11.1528 21 13.5C21 18.1944 17.1944 22 12.5 22H3M18.5104 7.48959L20 6" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" /><path d="M8 19H3" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" /><path d="M6 16H3" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" /><path d="M12.5 13.5L16 10" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />',
        'snippet' => <<<'PHP'
            Duration::fromMilliseconds(100)
            PHP,
        'summary' => 'The new immutable <code>Time\Duration</code> class represents a span of time with nanosecond precision, instead of loose integers and floats.',
        'docs' => 'https://www.php.net/manual/en/migration86.new-features.php#migration86.new-features.date',
    ],
    'readonly-property-defaults' => [
        'title' => 'Readonly Property Defaults',
        'icon' => '<path d="M12 14.5V17.5M13 14.5C13 15.0523 12.5523 15.5 12 15.5C11.4477 15.5 11 15.0523 11 14.5C11 13.9477 11.4477 13.5 12 13.5C12.5523 13.5 13 13.9477 13 14.5Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" /><path d="M16.5 9V6.5C16.5 4.01472 14.4853 2 12 2C9.51471 2 7.49999 4.01472 7.49999 6.5V9" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" /><path d="M4.2678 18.8447C4.49268 20.515 5.87612 21.8235 7.55965 21.9009C8.97627 21.966 10.4153 22 12 22C13.5847 22 15.0237 21.966 16.4403 21.9009C18.1239 21.8235 19.5073 20.515 19.7322 18.8447C19.8789 17.7547 20 16.6376 20 15.5C20 14.3624 19.8789 13.2453 19.7322 12.1553C19.5073 10.485 18.1239 9.17649 16.4403 9.09909C15.0237 9.03397 13.5847 9 12 9C10.4153 9 8.97627 9.03397 7.55965 9.09909C5.87612 9.17649 4.49268 10.485 4.2678 12.1553C4.12104 13.2453 3.99999 14.3624 3.99999 15.5C3.99999 16.6376 4.12104 17.7547 4.2678 18.8447Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />',
        'snippet' => <<<'PHP'
            public readonly int $value = 1;
            PHP,
        'summary' => 'Readonly properties can now declare a default value, removing boilerplate constructor assignments.',
        'docs' => 'https://www.php.net/manual/en/language.oop5.properties.php#language.oop5.properties.readonly-properties',
    ],
    'override-for-constants' => [
        'title' => '#[\Override] for Constants',
        'icon' => '<path d="M18.9905 19H19M18.9905 19C18.3678 19.6175 17.2393 19.4637 16.4479 19.4637C15.4765 19.4637 15.0087 19.6537 14.3154 20.347C13.7251 20.9374 12.9337 22 12 22C11.0663 22 10.2749 20.9374 9.68457 20.347C8.99128 19.6537 8.52349 19.4637 7.55206 19.4637C6.76068 19.4637 5.63218 19.6175 5.00949 19C4.38181 18.3776 4.53628 17.2444 4.53628 16.4479C4.53628 15.4414 4.31616 14.9786 3.59938 14.2618C2.53314 13.1956 2.00002 12.6624 2 12C2.00001 11.3375 2.53312 10.8044 3.59935 9.73817C4.2392 9.09832 4.53628 8.46428 4.53628 7.55206C4.53628 6.76065 4.38249 5.63214 5 5.00944C5.62243 4.38178 6.7556 4.53626 7.55208 4.53626C8.46427 4.53626 9.09832 4.2392 9.73815 3.59937C10.8044 2.53312 11.3375 2 12 2C12.6625 2 13.1956 2.53312 14.2618 3.59937C14.9015 4.23907 15.5355 4.53626 16.4479 4.53626C17.2393 4.53626 18.3679 4.38247 18.9906 5C19.6182 5.62243 19.4637 6.75559 19.4637 7.55206C19.4637 8.55858 19.6839 9.02137 20.4006 9.73817C21.4669 10.8044 22 11.3375 22 12C22 12.6624 21.4669 13.1956 20.4006 14.2618C19.6838 14.9786 19.4637 15.4414 19.4637 16.4479C19.4637 17.2444 19.6182 18.3776 18.9905 19Z" stroke="currentColor" stroke-width="1.5" /><path d="M9 12.8929C9 12.8929 10.2 13.5447 10.8 14.5C10.8 14.5 12.6 10.75 15 9.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />',
        'snippet' => <<<'PHP'
            #[\Override] const C = 'Changed';
            PHP,
        'summary' => 'The <code>#[\Override]</code> attribute now also works on class constants and enum cases, catching typos and stale overrides.',
        'docs' => 'https://www.php.net/manual/en/class.override.php',
    ],
    'secure-session-defaults' => [
        'title' => 'Secure Session Defaults',
        'icon' => '<path d="M18.7088 3.49534C16.8165 2.55382 14.5009 2 12 2C9.4991 2 7.1835 2.55382 5.29116 3.49534C4.36318 3.95706 3.89919 4.18792 3.4496 4.91378C3 5.63965 3 6.34248 3 7.74814V11.2371C3 16.9205 7.54236 20.0804 10.173 21.4338C10.9067 21.8113 11.2735 22 12 22C12.7265 22 13.0933 21.8113 13.8269 21.4338C16.4576 20.0804 21 16.9205 21 11.2371L21 7.74814C21 6.34249 21 5.63966 20.5504 4.91378C20.1008 4.18791 19.6368 3.95706 18.7088 3.49534Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" /><path d="M9 11.5C9 11.5 10.4079 11.7519 11 13.5C11 13.5 12.5 10.5 15 9.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />',
        'snippet' => <<<'PHP'
            session_start(); // secure by default
            PHP,
        'summary' => 'Sessions now use strict mode, <code>HttpOnly</code> cookies and <code>SameSite=Lax</code> out of the box.',
        'docs' => 'https://www.php.net/manual/en/migration86.incompatible.php#migration86.incompatible.session',
    ],
];

$roadmap = [
    ['8.5', 'Released Nov 20, 2025', false],
    ['8.6', 'Released Nov 19, 2026', true],
    ['8.7', 'In development', false],
    ['9.0', 'No release date yet', false],
];

// Accepted for 9.0 on wiki.php.net/rfc. The labels were checked against PHP 8.4 and 8.5.
$php9 = [
    ['Reading an undefined variable throws an <code>Error</code>', 'Warning since 8.0'],
    ['Reading an undefined property throws an <code>Error</code>', 'Warning since 8.0'],
    ['<code>"${var}"</code> string interpolation is removed', 'Deprecated since 8.2'],
    ['Implicitly nullable types like <code>int $id = null</code> are removed', 'Deprecated since 8.4'],
    ['Converting <code>false</code> to an array throws an <code>Error</code>', 'Deprecated since 8.1'],
    ['<code>++</code> on non-numeric strings throws a <code>TypeError</code>', 'Deprecated since 8.5'],
    ['The <code>Serializable</code> interface is removed', 'Deprecated since 8.1'],
    ['Session IDs in URLs and forms are no longer supported', 'Deprecated since 8.4'],
    ['Features deprecated in PHP 8.6 are removed', 'Deprecated in 8.6'],
];

$deprecatedCode = <<<'PHP'
    $name = 'PHP';

    function find(int $id = null) {}
    // Deprecated: find(): Implicitly marking parameter $id as nullable is deprecated, the explicit nullable type must be used instead

    echo "Hello ${name}";
    // Deprecated: Using ${var} in strings is deprecated, use {$var} instead
    PHP;

$readyCode = <<<'PHP'
    $name = 'PHP';

    function find(?int $id = null) {}

    echo "Hello {$name}";
    PHP;

// The biggest frameworks and the biggest open source projects built with PHP, with the figures behind each claim.
$ecosystem = [
    'laravel' => ['Laravel', 'Framework', 'https://laravel.com', 'The most used PHP framework, chosen by 64% of PHP developers.'],
    'symfony' => ['Symfony', 'Framework', 'https://symfony.com', 'A full-stack framework whose components also power Laravel.'],
    'wordpress' => ['WordPress', 'CMS', 'https://wordpress.org', 'The CMS behind 39.6% of all websites, from blogs to nasa.gov.'],
    'drupal' => ['Drupal', 'CMS', 'https://www.drupal.org', 'The CMS of choice for governments and large enterprises.'],
    'codeigniter' => ['CodeIgniter', 'Framework', 'https://codeigniter.com', 'A lightweight framework known for speed and a tiny footprint.'],
    'yii' => ['Yii', 'Framework', 'https://www.yiiframework.com', 'A fast, component-based framework for modern web applications.'],
    'moodle' => ['Moodle', 'Learning platform', 'https://moodle.org', 'The open source learning platform used by 500 million people.'],
    'prestashop' => ['PrestaShop', 'E-commerce', 'https://prestashop.com', 'The open source e-commerce platform behind 230,000 stores.'],
];

$tools = [
    'Composer' => ['https://getcomposer.org', 'Dependency manager'],
    'Packagist' => ['https://packagist.org', 'Package repository'],
    'PIE' => ['https://github.com/php/pie', 'Extension installer'],
    'PHPUnit' => ['https://phpunit.de', 'Testing framework'],
    'Pest' => ['https://pestphp.com', 'Testing framework'],
    'PHPStan' => ['https://phpstan.org', 'Static analysis'],
    'Psalm' => ['https://psalm.dev', 'Static analysis'],
    'Rector' => ['https://getrector.com', 'Automated upgrades'],
    'Xdebug' => ['https://xdebug.org', 'Debugger and profiler'],
    'FrankenPHP' => ['https://frankenphp.dev', 'Application server'],
];

// [released, active support until, security fixes until], from php.net/supported-versions.php.
// 8.6 follows the release cycle policy: two years of active support, then two years of security fixes.
$versions = [
    '8.6' => ['2026-11-19', '2028-12-31', '2030-12-31'],
    '8.5' => ['2025-11-20', '2027-12-31', '2029-12-31'],
    '8.4' => ['2024-11-21', '2026-12-31', '2028-12-31'],
    '8.3' => ['2023-11-23', '2025-12-31', '2027-12-31'],
    '8.2' => ['2022-12-08', '2024-12-31', '2026-12-31'],
];
$timeline = [strtotime('2022-01-01'), strtotime('2031-01-01')];
$position = fn(string $date): string => round((strtotime($date) - $timeline[0]) / ($timeline[1] - $timeline[0]) * 100, 2) . '%';
$span = fn(string $from, string $to): string => round((strtotime($to) - strtotime($from)) / ($timeline[1] - $timeline[0]) * 100, 2) . '%';
$today = date('Y-m-d');

// thephp.foundation, 24 Oct 2026
$sponsors = [
    'Platinum' => ['text-xl font-bold text-slate-900 dark:text-white', ['JetBrains', 'Automattic', 'Sovereign Tech Agency', 'Alpha-Omega']],
    'Gold' => ['text-lg font-semibold text-slate-800 dark:text-slate-100', ['GoDaddy.com', 'team.blue']],
    'Silver' => ['text-sm font-medium text-slate-600 dark:text-slate-400', ['Private Packagist', 'Craft CMS', 'Zend by Perforce', 'Tideways', 'Symfony Corp', 'Mercari Inc.', 'Les-Tilleuls.coop', 'pixiv Inc.', 'Aternos GmbH', 'Sentry', 'Team Cybozu', 'Manychat', 'Passbolt', 'CH Studio', 'TYPO3']],
];

require __DIR__ . '/includes/header.php';
?>
        <!-- hero -->
        <section class="js-video-bg relative isolate z-10 -mt-4 flex h-160 items-center justify-center overflow-hidden lg:-mt-16 lg:pt-16">
            <!-- the closing call to action's diamond grid, mirrored: strongest at the top centre, fading downward -->
            <svg aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10 size-full mask-radial-[70%_100%] mask-radial-from-25% mask-radial-at-top text-slate-900/10 dark:text-white/15">
                <defs>
                    <pattern id="hero-grid" width="40" height="40" patternUnits="userSpaceOnUse" patternTransform="scale(1 .6) rotate(45)"><path d="M40 0H0v40" fill="none" stroke="currentColor"></path></pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#hero-grid)"></rect>
            </svg>

            <div class="mx-auto max-w-4xl bg-radial from-white to-transparent to-65% px-4 text-center sm:px-6 lg:px-8 dark:from-slate-950">
                <h1 class="mb-5 text-4xl font-bold tracking-tight text-balance sm:text-5xl lg:text-6xl">Less Boilerplate. Safer Defaults.</h1>
                <p class="mx-auto mb-8 max-w-2xl leading-relaxed text-slate-500 *:text-slate-900 lg:mb-10 dark:text-slate-300 dark:*:text-white"><strong>PHP 8.6 helps you write less code and ship safer apps.</strong> Turn function calls into closures with <strong>partial function application</strong>, drop constructor boilerplate with <strong>readonly property defaults</strong>, and replace hand-written helpers with <strong>clamp()</strong> and the new <strong>Duration</strong> class. Sessions now use <strong>secure defaults</strong> out of the box.</p>

                <div class="flex flex-col items-center justify-center gap-4 lg:flex-row">
                    <a href="https://www.php.net/downloads.php" class="inline-flex min-h-10 w-full items-center justify-center rounded-full bg-brand-500 px-5 text-sm font-semibold text-white hover:bg-brand-500/90 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-800 sm:w-auto">Download PHP 8.6</a>
                    <a href="#features" class="inline-flex min-h-10 w-full items-center justify-center rounded-full bg-white px-5 text-sm font-semibold text-slate-900 shadow-xs ring-1 ring-slate-200/50 hover:bg-slate-50/50 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-800 sm:w-auto dark:ring-0">What's new in 8.6</a>
                </div>

                <a href="#road-to-php-9" class="mt-6 inline-flex items-center gap-1.5 text-sm font-semibold text-brand-500 underline-offset-2 hover:underline dark:text-white">What's changing in PHP 9 <span aria-hidden="true">→</span></a>
            </div>
        </section>

        <!-- php in numbers -->
        <section class="relative z-10 mx-auto max-w-7xl px-4 pb-20 lg:px-8 lg:pb-28">
            <dl class="grid grid-cols-2 gap-y-12 lg:grid-cols-4 lg:divide-x lg:divide-slate-900/10 lg:dark:divide-slate-800">
                <?php foreach ($stats as [$value, $label]): ?>
                    <div class="flex flex-col-reverse items-center justify-end gap-3 px-4 text-center">
                        <dt class="max-w-52 text-sm/6 text-balance text-slate-600 dark:text-slate-400"><?= $label ?></dt>
                        <dd class="text-4xl font-bold tracking-tight text-slate-900 sm:text-5xl dark:text-white"><?= $value ?></dd>
                    </div>
                <?php endforeach ?>
            </dl>
            <p class="mt-10 text-center text-xs text-slate-500 dark:text-slate-500">Sources: <a href="https://w3techs.com/technologies/details/pl-php" class="underline underline-offset-2 hover:no-underline">W3Techs</a> and <a href="https://packagist.org/statistics" class="underline underline-offset-2 hover:no-underline">Packagist</a>, October 2026.</p>

            <div class="mt-13 border-t border-slate-900/10 pt-12 dark:border-slate-800">
                <h2 class="text-center font-semibold text-balance text-slate-700 dark:text-slate-200">Behind the sites and apps millions of people use every day</h2>
                <ul role="list" class="mt-8 flex flex-wrap items-center justify-center gap-x-10 gap-y-6 text-slate-500 lg:gap-x-14 dark:text-slate-400">
                    <?php foreach ($poweredBy as $slug => $name): ?>
                        <li class="flex items-center gap-2 text-base font-semibold">
                            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="size-6"><path d="<?= $icons[$slug][1] ?>" /></svg>
                            <?= $name ?>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </section>

        <!-- key features -->
        <section id="features" class="relative z-10 scroll-mt-20 pb-20 lg:pb-28">
            <div class="mx-auto max-w-3xl px-4 text-center lg:px-8">
                <p class="text-sm/6 font-semibold text-brand-500 dark:text-brand-400">What's new</p>
                <h2 class="mt-2 text-3xl font-bold tracking-tight text-balance lg:text-4xl">Key Features in PHP 8.6</h2>
                <p class="mt-4 text-balance text-slate-600 lg:text-lg dark:text-slate-300">Less glue code, fewer hand-written helpers and safer defaults. Each feature links to its documentation in the PHP manual.</p>
            </div>

            <!-- bento grid: the outer corners of the grid are rounder -->
            <div class="mx-auto mt-12 grid max-w-7xl gap-4 px-4 lg:mt-16 lg:grid-cols-3 lg:grid-rows-2 lg:px-8">
                <?php foreach ($features as $feature): ?>
                    <div class="group relative flex flex-col rounded-2xl bg-white shadow-2xs ring-1 ring-slate-900/8 dark:bg-slate-900 dark:ring-slate-800 p-8 transition-colors hover:bg-slate-50 max-lg:first:rounded-t-4xl max-lg:last:rounded-b-4xl sm:p-10 lg:first:rounded-tl-4xl lg:last:rounded-br-4xl lg:nth-3:rounded-tr-4xl lg:nth-4:rounded-bl-4xl dark:hover:bg-slate-800/60">
                        <div class="flex items-start justify-between">
                            <div class="flex size-11 items-center justify-center rounded-xl bg-brand-500/10 text-brand-500 ring-1 ring-brand-500/20 ring-inset dark:bg-brand-400/10 dark:text-brand-400 dark:ring-brand-400/20">
                                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" class="size-6"><?= $feature['icon'] ?></svg>
                            </div>
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" class="size-5 text-slate-300 transition group-hover:translate-x-0.5 group-hover:text-brand-500 dark:text-slate-600 dark:group-hover:text-brand-400"><path d="M18.5 12L4.99997 12" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" /><path d="M13 18C13 18 19 13.5811 19 12C19 10.4188 13 6 13 6" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" /></svg>
                        </div>
                        <a href="<?= $feature['docs'] ?>" class="mt-6 text-lg font-semibold text-slate-950 dark:text-white"><span class="absolute inset-0"></span><?= $feature['title'] ?></a>
                        <p class="mt-3 text-sm/6 text-slate-600 dark:text-slate-300 [&_code]:rounded-md [&_code]:bg-slate-200/50 [&_code]:px-1 [&_code]:py-0.5 [&_code]:text-sm dark:[&_code]:bg-black/20"><?= $feature['summary'] ?></p>
                        <div class="mt-auto pt-6">
                            <code class="js-code block overflow-x-auto rounded-lg bg-slate-50 px-3 py-2 text-xs/5 whitespace-pre text-slate-500 ring-1 ring-slate-900/5 dark:bg-black/20 dark:text-slate-400 dark:ring-slate-800/60"><?= htmlspecialchars($feature['snippet']) ?></code>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <p class="mt-10 text-center text-sm/6"><a href="https://www.php.net/manual/en/migration86.php" class="font-semibold text-brand-500 underline-offset-2 hover:underline dark:text-brand-400">Read the PHP 8.6 migration guide <span aria-hidden="true">→</span></a></p>
        </section>

        <!-- road to php 9: a dark editorial band. Hairlines and type carry it; the accent marks only the current release. -->
        <section id="road-to-php-9" class="relative z-10 scroll-mt-20 border-t border-slate-900/10 bg-white py-20 text-slate-900 lg:py-28 dark:border-slate-800 dark:bg-slate-950 dark:text-white [&_:not(pre)>code]:rounded-md [&_:not(pre)>code]:bg-slate-200/50 [&_:not(pre)>code]:px-1 [&_:not(pre)>code]:py-0.5 [&_:not(pre)>code]:text-[0.875em] dark:[&_:not(pre)>code]:bg-slate-800">
            <div class="mx-auto max-w-7xl px-4 lg:px-8">
                <div class="max-w-3xl">
                    <p class="text-sm/6 font-semibold text-brand-500 dark:text-brand-400">Road to PHP 9</p>
                    <h2 class="mt-2 text-4xl font-bold tracking-tight text-balance lg:text-5xl">Today's deprecations are tomorrow's errors.</h2>
                    <p class="mt-6 text-lg/8 text-slate-600 dark:text-slate-400">PHP 9.0 doesn't have a release date yet, and PHP 8.7 is already in development. But many of the changes PHP 9 will bring have already been voted on, and each one is announced today as a deprecation or a warning, so you can prepare at your own pace.</p>
                </div>

                <!-- timeline: a hairline with one marker per release -->
                <ol role="list" class="mt-12 grid gap-10 border-t border-slate-900/10 sm:grid-cols-2 sm:gap-6 lg:mt-16 lg:grid-cols-4 dark:border-slate-800">
                    <?php foreach ($roadmap as [$version, $status, $current]): ?>
                        <li class="relative pt-8 before:absolute before:-top-px before:left-0 before:h-0.5 before:w-12 <?= $current ? 'before:bg-brand-500 dark:before:bg-brand-400' : 'before:bg-slate-900/30 dark:before:bg-slate-500' ?>"<?= $current ? ' aria-current="step"' : '' ?>>
                            <p class="text-2xl font-bold tracking-tight">PHP <?= $version ?></p>
                            <p class="mt-1 text-sm/6 <?= $current ? 'text-brand-500 dark:text-brand-400' : 'text-slate-500 dark:text-slate-400' ?>"><?= $status ?></p>
                        </li>
                    <?php endforeach ?>
                </ol>

                <div class="mt-20 grid gap-16 lg:grid-cols-5 lg:gap-12">
                    <div class="lg:sticky lg:top-24 lg:col-span-3 lg:self-start">
                        <h3 class="text-sm/6 font-semibold text-slate-500 dark:text-slate-400">Already accepted for PHP 9.0</h3>
                        <ul role="list" class="mt-4 divide-y divide-slate-900/10 border-y border-slate-900/10 dark:divide-slate-800 dark:border-slate-800">
                            <?php foreach ($php9 as [$change, $since]): ?>
                                <li class="flex flex-col gap-1 py-4 sm:flex-row sm:items-baseline sm:justify-between sm:gap-6">
                                    <span class="text-base/7 text-slate-900 dark:text-slate-200"><?= $change ?></span>
                                    <span class="shrink-0 font-mono text-xs whitespace-nowrap text-slate-400 dark:text-slate-500"><?= $since ?></span>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>

                    <div class="lg:col-span-2">
                        <h3 class="text-sm/6 font-semibold text-slate-500 dark:text-slate-400">Fix it today</h3>
                        <p class="mt-4 text-base/7 text-slate-900 dark:text-slate-200">Report every error with <code>E_ALL</code> in development and fix deprecations as they appear. PHPStan, Psalm and Rector do most of the work.</p>
                        <div class="mt-6 grid gap-4 text-sm [&_pre]:leading-relaxed dark:[&_.js-code-block]:border-slate-800 dark:[&_.js-code-block]:bg-slate-900">
                            <?php code_block($deprecatedCode, 'Deprecated in PHP 8', lineNumbers: true) ?>
                            <?php code_block($readyCode, 'Ready for PHP 9', lineNumbers: true) ?>
                        </div>
                        <a href="https://wiki.php.net/rfc" class="mt-8 inline-flex items-center gap-1.5 text-sm font-semibold text-slate-900 underline-offset-4 hover:underline dark:text-white">Read the accepted RFCs <span aria-hidden="true">→</span></a>
                    </div>
                </div>
            </div>
        </section>

        <!-- ecosystem -->
        <section id="ecosystem" class="relative isolate z-10 scroll-mt-20 border-y border-slate-900/10 bg-slate-50 py-20 lg:py-28 dark:border-slate-800 dark:bg-slate-900/30">
            <div class="mx-auto max-w-3xl px-4 text-center lg:px-8">
                <p class="text-sm/6 font-semibold text-brand-500 dark:text-brand-400">Ecosystem</p>
                <h2 class="mt-2 text-3xl font-bold tracking-tight text-balance lg:text-4xl">Build on a Thriving Ecosystem</h2>
                <p class="mt-4 text-balance text-slate-600 lg:text-lg dark:text-slate-300">The most used frameworks and the largest open source projects are built with PHP, backed by tools the whole community relies on.</p>
            </div>

            <ul role="list" class="mx-auto mt-12 grid max-w-7xl gap-4 px-4 sm:grid-cols-2 lg:mt-16 lg:px-8 xl:grid-cols-4">
                <?php foreach ($ecosystem as $slug => [$name, $kind, $url, $description]): ?>
                    <li class="relative rounded-2xl bg-white shadow-2xs ring-1 ring-slate-900/8 dark:bg-slate-900 dark:ring-slate-800 p-6 transition-colors hover:bg-slate-50 dark:hover:bg-slate-800/60">
                        <?php [$color, $path] = $icons[$slug]; [$r, $g, $b] = sscanf($color, '#%02x%02x%02x'); ?>
                        <!-- official brand colour; near-black marks switch to white in dark mode -->
                        <svg viewBox="0 0 24 24" fill="currentColor" fill-rule="evenodd" aria-hidden="true" style="--brand: <?= $color ?>" class="size-8 text-(--brand)<?= (0.2126 * $r + 0.7152 * $g + 0.0722 * $b) < 40 ? ' dark:text-white' : '' ?>"><path d="<?= $path ?>" /></svg>
                        <div class="mt-5 flex items-baseline justify-between gap-3">
                            <a href="<?= $url ?>" class="font-semibold text-slate-950 dark:text-white"><span class="absolute inset-0"></span><?= $name ?></a>
                            <span class="text-xs font-medium whitespace-nowrap text-slate-400 dark:text-slate-500"><?= $kind ?></span>
                        </div>
                        <p class="mt-1 line-clamp-2 text-sm/6 text-slate-600 dark:text-slate-300"><?= $description ?></p>
                    </li>
                <?php endforeach ?>
            </ul>

            <div class="mx-auto mt-20 max-w-7xl px-4 lg:px-8">
                <div class="flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
                    <h3 class="text-xl font-semibold tracking-tight text-slate-900 dark:text-white">Essential tools</h3>
                    <p class="text-sm/6 text-slate-600 dark:text-slate-400">Dependencies, testing, analysis and runtime, built by the community.</p>
                </div>
                <ul role="list" class="mt-6 grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-5">
                    <?php foreach ($tools as $name => [$url, $description]): ?>
                        <li class="relative rounded-2xl bg-white p-5 shadow-2xs ring-1 ring-slate-900/8 transition-colors hover:bg-slate-50 dark:bg-slate-900 dark:ring-slate-800 dark:hover:bg-slate-800/60">
                            <a href="<?= $url ?>" class="font-semibold text-slate-950 dark:text-white"><span class="absolute inset-0"></span><?= $name ?></a>
                            <p class="mt-1 text-sm/6 text-slate-600 dark:text-slate-400"><?= $description ?></p>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </section>

        <!-- supported versions -->
        <section id="supported-versions" class="relative z-10 scroll-mt-20 py-20 lg:py-28">
            <div class="mx-auto max-w-3xl px-4 text-center lg:px-8">
                <p class="text-sm/6 font-semibold text-brand-500 dark:text-brand-400">Release cycle</p>
                <h2 class="mt-2 text-3xl font-bold tracking-tight text-balance lg:text-4xl">Supported Versions</h2>
                <p class="mt-4 text-balance text-slate-600 lg:text-lg dark:text-slate-300">Each release is actively supported for two years, then receives security fixes for two more.</p>
            </div>

            <div class="mx-auto mt-12 max-w-5xl px-4 lg:mt-16 lg:px-8">
                <ul role="list" class="divide-y divide-slate-200 border-b border-slate-200 dark:divide-slate-800 dark:border-slate-800">
                    <!-- year axis: a row of the same grid as the bars, so the two scales can never drift apart -->
                    <li aria-hidden="true" class="hidden gap-x-8 pb-3 sm:grid sm:grid-cols-[6rem_1fr_13rem]">
                        <div class="relative col-start-2 h-7 text-xs text-slate-500 dark:text-slate-500">
                            <?php // each label sits over the middle of its year, so a bar ending on 31 Dec reaches the right edge of that year's span ?>
                            <?php for ($year = 2022; $year <= 2030; $year++): ?>
                                <span class="absolute top-0 flex -translate-x-1/2 flex-col items-center gap-1 tabular-nums after:h-1.5 after:w-px after:bg-slate-300 dark:after:bg-slate-700" style="left: <?= $position("$year-07-02") ?>"><?= $year ?></span>
                            <?php endfor ?>
                        </div>
                    </li>
                    <?php foreach ($versions as $version => [$released, $active, $security]): ?>
                        <?php [$status, $badge] = match (true) {
                            $today < $released => ['Upcoming', 'bg-slate-200 text-slate-800 dark:bg-slate-800 dark:text-slate-300'],
                            $today <= $active => ['Active support', 'bg-brand-500/10 text-brand-500 dark:bg-brand-400/10 dark:text-brand-400'],
                            $today <= $security => ['Security fixes only', 'bg-amber-200 text-amber-900 dark:bg-amber-400/10 dark:text-amber-400'],
                            default => ['End of life', 'bg-red-200 text-red-900 dark:bg-red-400/10 dark:text-red-400'],
                        } ?>
                        <li class="grid items-center gap-x-8 gap-y-3 py-5 sm:grid-cols-[6rem_1fr_13rem]">
                            <p class="text-xl font-bold">PHP <?= $version ?></p>
                            <div aria-hidden="true" class="relative hidden h-2.5 rounded-full bg-black/5 sm:block dark:bg-slate-800" style="--released: <?= $position($released) ?>; --active: <?= $span($released, $active) ?>; --active-end: <?= $position($active) ?>; --security: <?= $span($active, $security) ?>; --today: <?= $position($today) ?>">
                                <div class="absolute inset-y-0 left-(--released) w-(--active) rounded-l-full bg-brand-500"></div>
                                <div class="absolute inset-y-0 left-(--active-end) w-(--security) rounded-r-full bg-brand-500/35"></div>
                                <div class="absolute -inset-y-1.5 left-(--today) w-0.5 rounded-full bg-slate-900 dark:bg-white"></div>
                            </div>
                            <div class="text-sm/6">
                                <span class="inline-flex items-center rounded-md px-1.5 py-0.5 text-xs font-medium <?= $badge ?>"><?= $status ?></span>
                                <p class="mt-1 text-slate-600 dark:text-slate-400">Security fixes until <?= date('j M Y', strtotime($security)) ?></p>
                            </div>
                        </li>
                    <?php endforeach ?>
                </ul>
                <p class="mt-4 hidden items-center gap-6 text-xs text-slate-600 sm:flex dark:text-slate-400">
                    <span class="inline-flex items-center gap-2"><span class="size-2.5 rounded-full bg-brand-500"></span>Active support</span>
                    <span class="inline-flex items-center gap-2"><span class="size-2.5 rounded-full bg-brand-500/35"></span>Security fixes only</span>
                    <span class="inline-flex items-center gap-2"><span class="h-3 w-0.5 rounded-full bg-slate-900 dark:bg-white"></span>Today</span>
                </p>
            </div>
        </section>

        <!-- the php foundation -->
        <section id="foundation" class="relative isolate z-10 scroll-mt-20 border-y border-slate-900/10 bg-slate-50 py-20 lg:py-28 dark:border-slate-800 dark:bg-slate-900/30">
            <div class="mx-auto grid max-w-7xl gap-12 px-4 lg:grid-cols-2 lg:gap-16 lg:px-8">
                <div>
                    <p class="text-sm/6 font-semibold text-brand-500 dark:text-brand-400">The PHP Foundation</p>
                    <h2 class="mt-2 text-3xl font-bold tracking-tight text-balance lg:text-4xl">Invest in the language your business runs on.</h2>
                    <p class="mt-6 leading-relaxed text-slate-600 lg:text-lg dark:text-slate-300">The PHP Foundation is a collective of people and organizations, united in the mission to ensure the long-term prosperity of the PHP language. Sponsorships fund the engineers who maintain PHP, review contributions, harden its security, and build what comes next.</p>

                    <dl class="mt-10 grid grid-cols-3 gap-6 border-t border-slate-200 pt-8 dark:border-slate-800">
                        <div class="flex flex-col-reverse justify-end gap-1">
                            <dt class="text-sm/6 text-slate-600 dark:text-slate-400">engineers funded</dt>
                            <dd class="text-3xl font-bold tracking-tight">13</dd>
                        </div>
                        <div class="flex flex-col-reverse justify-end gap-1">
                            <dt class="text-sm/6 text-slate-600 dark:text-slate-400">of core commits in 2025</dt>
                            <dd class="text-3xl font-bold tracking-tight">~42%</dd>
                        </div>
                        <div class="flex flex-col-reverse justify-end gap-1">
                            <dt class="text-sm/6 text-slate-600 dark:text-slate-400">sponsors in 2025</dt>
                            <dd class="text-3xl font-bold tracking-tight">536</dd>
                        </div>
                    </dl>

                    <ul role="list" class="mt-8 space-y-3 text-sm/6 text-slate-700 dark:text-slate-300">
                        <?php foreach (['Shipped PIE 1.0, the new installer for PHP extensions', 'Completed an independent security audit of PHP’s core', 'Brought FrankenPHP under the official PHP organization', 'Launched an Ecosystem Security Team'] as $achievement): ?>
                            <li class="flex gap-3">
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="mt-0.5 size-5 shrink-0 text-brand-500 dark:text-brand-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                </svg>
                                <?= $achievement ?>
                            </li>
                        <?php endforeach ?>
                    </ul>

                    <div class="mt-10 flex flex-col gap-4 sm:flex-row">
                        <a href="https://thephp.foundation/sponsor/" class="inline-flex min-h-10 w-full items-center justify-center rounded-full bg-brand-500 px-5 text-sm font-semibold text-white hover:bg-brand-500/90 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-800 sm:w-auto">Become a sponsor</a>
                        <a href="https://opencollective.com/phpfoundation" class="inline-flex min-h-10 w-full items-center justify-center rounded-full bg-white px-5 text-sm font-semibold text-slate-900 shadow-xs ring-1 ring-slate-200 hover:bg-slate-100/95 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-800 sm:w-auto dark:ring-0">Donate any amount</a>
                    </div>
                </div>

                <div class="rounded-2xl bg-white shadow-2xs ring-1 ring-slate-900/8 dark:bg-slate-900 dark:ring-slate-800 p-6 md:p-10">
                    <h3 class="text-sm/6 font-semibold text-slate-900 dark:text-white">Thank you to our sponsors</h3>
                    <div class="mt-8 space-y-8">
                        <?php foreach ($sponsors as $tier => [$style, $names]): ?>
                            <div>
                                <h4 class="text-xs/5 font-semibold tracking-wide text-slate-500 uppercase dark:text-slate-500"><?= $tier ?></h4>
                                <ul role="list" class="mt-3 flex flex-wrap gap-x-6 gap-y-2 <?= $style ?>">
                                    <?php foreach ($names as $name): ?>
                                        <li><?= $name ?></li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        <?php endforeach ?>
                    </div>
                    <div class="mt-10 rounded-xl bg-slate-50 p-6 ring-1 ring-slate-900/8 dark:bg-slate-900 dark:ring-slate-800">
                        <p class="font-semibold text-slate-900 dark:text-white">Is your company built on PHP?</p>
                        <p class="mt-1 text-sm/6 text-slate-600 dark:text-slate-400">Company sponsorships start at $1,000 a month and put your logo in front of the PHP community.</p>
                        <a href="https://thephp.foundation/sponsor/" class="mt-4 inline-flex items-center gap-1.5 text-sm font-semibold text-brand-500 underline-offset-2 hover:underline dark:text-brand-400">See sponsorship tiers <span aria-hidden="true">→</span></a>
                    </div>
                </div>
            </div>
        </section>

        <!-- call to action -->
        <section data-video-fade="top" class="js-video-bg relative isolate z-10 overflow-hidden py-20 lg:py-28">
            <!-- the same diamond grid as the Road to PHP 9 panel, fading out from the bottom centre (the laravel.com "What will you ship?" pattern) -->
            <svg aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10 size-full mask-radial-[70%_100%] mask-radial-from-25% mask-radial-at-bottom text-slate-900/10 dark:text-white/15">
                <defs>
                    <pattern id="cta-grid" width="40" height="40" patternUnits="userSpaceOnUse" patternTransform="scale(1 .6) rotate(45)"><path d="M40 0H0v40" fill="none" stroke="currentColor"></path></pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#cta-grid)"></rect>
            </svg>

            <div class="mx-auto max-w-4xl px-4 text-center lg:px-8">
                <svg fill="none" viewBox="0 0 16 16" aria-hidden="true" class="mx-auto size-16 text-slate-800 dark:text-slate-100"><path fill="currentColor" d="M0 12.2v-.7a.5.5 0 0 1 1 0v.8c0 .2.1.3.3.5l.7.2.8-.2.2-.6V5c0-2 1.7-4 4.1-4 2.4 0 4 1.4 4.4 3 1 .1 2 .4 3 1.1l1 1.4c.3.5.5 1 .5 1.5v5.5c0 .3-.2.5-.5.5h-8a.5.5 0 0 1-.5-.5v-4c0-.2.1-.4.3-.5a6 6 0 0 0 2.4-1.5c.5-.7.9-1.6.8-3 0-1-1.2-2.5-3.3-2.5A3.1 3.1 0 0 0 4 5v7.2c0 .6-.2 1-.6 1.3-.3.4-.8.5-1.4.5-.5 0-1-.2-1.3-.4-.4-.3-.6-.7-.7-1.2v-.2ZM11.5 5a5 5 0 0 1-1 3.1C9.8 9 8.9 9.4 8 9.8V13h3v-2.5a.5.5 0 0 1 1 0V13h3V8c0-.2 0-.6-.3-1-.2-.4-.5-.8-.9-1.1a5 5 0 0 0-2.3-.9ZM7 5a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z" /></svg>

                <h2 class="my-10 text-3xl font-bold tracking-tight text-balance text-slate-900 lg:text-4xl dark:text-white">Better performance, better syntax, improved type safety.</h2>

                <div class="mb-10 flex justify-center">
                    <a href="https://www.php.net/downloads.php" class="inline-flex min-h-10 w-full items-center justify-center rounded-full bg-brand-500 px-5 text-sm font-semibold text-white hover:bg-brand-500/90 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-800 sm:w-auto">Upgrade to 8.6 Now</a>
                </div>

                <p class="mx-auto mb-6 max-w-2xl leading-relaxed text-slate-900/80 dark:text-slate-300">For source downloads of PHP 8.6 please visit the <a href="https://www.php.net/downloads.php" class="underline underline-offset-2 hover:no-underline">downloads</a> page. Windows binaries can be found on the <a href="https://windows.php.net/download" target="_blank" class="underline underline-offset-2 hover:no-underline">PHP for Windows</a> site. The list of changes is recorded in the <a href="https://www.php.net/ChangeLog-8.php#PHP_8_6" class="underline underline-offset-2 hover:no-underline">ChangeLog</a>.</p>
                <p class="mx-auto max-w-2xl leading-relaxed text-slate-900/80 dark:text-slate-300">The <a href="https://www.php.net/manual/en/migration86.php" class="underline underline-offset-2 hover:no-underline">migration guide</a> is available in the PHP Manual. Please consult it for a detailed list of new features and backward-incompatible changes.</p>
            </div>
        </section>
<?php require __DIR__ . '/includes/footer.php'; ?>
