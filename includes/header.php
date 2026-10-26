<?php

// Shared <head> and site header. Set $active to the current nav label before including.

$active ??= '';

$nav = ['Downloads' => '#', 'Documentation' => 'docs.php', 'Get Involved' => '#', 'Help' => '#'];

// Shared by the header's selects, search button and theme toggle.
$control = 'rounded-xl bg-white/80 outline-1 -outline-offset-1 outline-slate-300 focus:ring-2 focus:ring-slate-950/5 lg:hover:ring-2 lg:hover:ring-slate-950/5 dark:bg-slate-900 dark:text-white dark:outline-slate-800 dark:focus:ring-slate-800/60 lg:dark:hover:ring-slate-800/60';
$select = "$control col-start-1 row-start-1 h-9 w-full appearance-none pr-6 pl-3 text-base text-slate-900 sm:text-sm/6 dark:*:bg-slate-800";
$chevron = '<svg viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-slate-500 sm:size-4 dark:text-slate-400"><path d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" fill-rule="evenodd" /></svg>';
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>PHP is Awesome 🔥</title>
        <link rel="icon" type="image/svg+xml" sizes="any" href="assets/favicon/favicon.svg" />
        <link rel="icon" type="image/png" sizes="196x196" href="assets/favicon/favicon-196x196.png" />
        <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png" />
        <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png" />
        <link rel="shortcut icon" href="assets/favicon/favicon.ico" />
        <link rel="stylesheet" href="<?= asset('assets/css/style.css') ?>" />
        <script>
            document.documentElement.classList.toggle('dark', localStorage.theme === 'dark' || (localStorage.theme !== 'light' && matchMedia('(prefers-color-scheme: dark)').matches));
        </script>
    </head>
    <body class="relative bg-white text-slate-900 antialiased dark:bg-slate-950 dark:text-white">
        <!-- header -->
        <header class="sticky top-0 z-50 w-full bg-white/80 py-3 shadow-2xs dark:shadow-white/5 backdrop-blur-md dark:bg-slate-950/50">
            <nav class="relative mx-auto flex w-full max-w-7xl px-6 lg:px-8">
                <a href="./" aria-label="PHP" class="mr-6">
                    <svg viewBox="0 -1 100 50" fill="currentColor" aria-hidden="true" class="inline-block h-10 text-brand-500 dark:text-white">
                        <path d="m7.579 10.123 14.204 0c4.169 0.035 7.19 1.237 9.063 3.604 1.873 2.367 2.491 5.6 1.855 9.699-0.247 1.873-0.795 3.71-1.643 5.512-0.813 1.802-1.943 3.427-3.392 4.876-1.767 1.837-3.657 3.003-5.671 3.498-2.014 0.495-4.099 0.742-6.254 0.742l-6.36 0-2.014 10.07-7.367 0 7.579-38.001 0 0m6.201 6.042-3.18 15.9c0.212 0.035 0.424 0.053 0.636 0.053 0.247 0 0.495 0 0.742 0 3.392 0.035 6.219-0.3 8.48-1.007 2.261-0.742 3.781-3.321 4.558-7.738 0.636-3.71 0-5.848-1.908-6.413-1.873-0.565-4.222-0.83-7.049-0.795-0.424 0.035-0.83 0.053-1.219 0.053-0.353 0-0.724 0-1.113 0l0.053-0.053" />
                        <path d="m41.093 0 7.314 0-2.067 10.123 6.572 0c3.604 0.071 6.289 0.813 8.056 2.226 1.802 1.413 2.332 4.099 1.59 8.056l-3.551 17.649-7.42 0 3.392-16.854c0.353-1.767 0.247-3.021-0.318-3.763-0.565-0.742-1.784-1.113-3.657-1.113l-5.883-0.053-4.346 21.783-7.314 0 7.632-38.054 0 0" />
                        <path d="m70.412 10.123 14.204 0c4.169 0.035 7.19 1.237 9.063 3.604 1.873 2.367 2.491 5.6 1.855 9.699-0.247 1.873-0.795 3.71-1.643 5.512-0.813 1.802-1.943 3.427-3.392 4.876-1.767 1.837-3.657 3.003-5.671 3.498-2.014 0.495-4.099 0.742-6.254 0.742l-6.36 0-2.014 10.07-7.367 0 7.579-38.001 0 0m6.201 6.042-3.18 15.9c0.212 0.035 0.424 0.053 0.636 0.053 0.247 0 0.495 0 0.742 0 3.392 0.035 6.219-0.3 8.48-1.007 2.261-0.742 3.781-3.321 4.558-7.738 0.636-3.71 0-5.848-1.908-6.413-1.873-0.565-4.222-0.83-7.049-0.795-0.424 0.035-0.83 0.053-1.219 0.053-0.353 0-0.724 0-1.113 0l0.053-0.053" />
                    </svg>
                </a>

                <div id="js-nav-menu" class="mt-16 -ml-26 hidden flex-1 flex-col items-center justify-between border-t border-slate-200 pt-5 lg:mt-0 lg:ml-0 lg:flex lg:flex-row lg:border-0 lg:pt-0 dark:border-slate-800">
                    <div class="mb-5 flex flex-col gap-6 text-sm lg:mb-0 lg:flex-row lg:items-center">
                        <?php foreach ($nav as $label => $href): ?>
                            <a href="<?= $href ?>" class="underline-offset-2 hover:underline"<?= $label === $active ? ' aria-current="page"' : '' ?>><?= $label ?></a>
                        <?php endforeach ?>

                        <div class="inline-grid w-full grid-cols-1 lg:w-16">
                            <select aria-label="PHP version" class="<?= $select ?>">
                                <option>8.6</option>
                                <option>8.5</option>
                                <option>8.4</option>
                            </select>
                            <?= $chevron ?>
                        </div>
                    </div>

                    <div class="flex flex-1 flex-col gap-5 pb-4 lg:flex-row lg:justify-end lg:gap-3 lg:pb-0">
                        <button type="button" class="<?= $control ?> flex h-9 shrink-0 cursor-pointer items-center px-2.5 text-base whitespace-nowrap text-slate-500 sm:text-sm/6 lg:w-60">
                            <svg fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="mr-2 size-4.5 shrink-0">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                            Search documentation...
                            <kbd class="mr-0.5 ml-auto font-sans text-xs text-slate-500 *:mr-0.5 *:font-sans dark:text-slate-500"><kbd>⌘</kbd><kbd>K</kbd></kbd>
                        </button>

                        <div class="inline-grid w-full grid-cols-1 lg:w-16">
                            <!-- language select for desktop -->
                            <select aria-label="Language" class="<?= $select ?> hidden lg:block">
                                <option>EN</option>
                                <option>PT</option>
                            </select>

                            <!-- language select for mobile -->
                            <select aria-label="Language" class="<?= $select ?> lg:hidden">
                                <option>English</option>
                                <option>Português</option>
                            </select>
                            <?= $chevron ?>
                        </div>

                        <!-- shows the icon of the current theme; main.js sets data-theme -->
                        <button type="button" data-theme="system" aria-label="Switch to light theme" class="js-theme-toggle group <?= $control ?> flex size-9 cursor-pointer items-center px-2.5 text-slate-500">
                            <svg width="20" height="20" fill="none" viewBox="0 0 20 20" aria-hidden="true" class="hidden group-data-[theme=light]:block">
                                <path fill="currentColor" d="M9.52734 16.7852h1.24996v2.5195H9.52734v-2.5195Zm-3.62304-1.501-1.78125 1.7812-.88477-.8838.44238-.4414.89746-.8984.44239-.4414.88379.8838Zm9.8223-.4424 1.3388 1.3398-.8838.8838-1.7812-1.7812.8838-.8838.4424.4414ZM6.61621 6.61621c1.95259-1.95249 5.11869-1.9524 7.07129 0 1.9526 1.95264 1.9526 5.11869 0 7.07129-1.9526 1.9527-5.11863 1.9527-7.07129 0-1.95241-1.9526-1.95253-5.11871 0-7.07129ZM12.8037 7.5C11.3393 6.03577 8.96445 6.03565 7.5 7.5c-1.46441 1.46444-1.46424 3.8393 0 5.3037 1.46451 1.4645 3.8393 1.4645 5.3037 0 1.4645-1.4644 1.4645-3.8392 0-5.3037ZM3.51953 9.52734v1.24996H1V9.52734h2.51953Zm15.78517 0v1.24996h-2.5195V9.52734h2.5195ZM5.9043 5.02051l-.88379.88379-1.78223-1.78223.88379-.88379L5.9043 5.02051Zm11.1611-.89746L15.2842 5.9043l-.8838-.88379.4414-.44239.8984-.89746.4414-.44238.8838.88477ZM9.52734 1h1.24996v2.51953H9.52734V1Z" />
                            </svg>
                            <svg width="20" height="20" fill="none" viewBox="0 0 24 24" aria-hidden="true" class="hidden group-data-[theme=system]:block">
                                <path d="M14 21H16M14 21C13.1716 21 12.5 20.3284 12.5 19.5V17L12 17M14 21H10M10 21H8M10 21C10.8284 21 11.5 20.3284 11.5 19.5V17L12 17M12 17V21" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
                                <path d="M16 3H8C5.17157 3 3.75736 3 2.87868 3.87868C2 4.75736 2 6.17157 2 9V11C2 13.8284 2 15.2426 2.87868 16.1213C3.75736 17 5.17157 17 8 17H16C18.8284 17 20.2426 17 21.1213 16.1213C22 15.2426 22 13.8284 22 11V9C22 6.17157 22 4.75736 21.1213 3.87868C20.2426 3 18.8284 3 16 3Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
                            </svg>
                            <svg width="20" height="20" fill="none" viewBox="0 0 20 20" aria-hidden="true" class="hidden group-data-[theme=dark]:block">
                                <path fill="currentColor" fill-rule="evenodd" d="M16.3206 11.5837c-.5616.1539-1.1526.2361-1.7622.2361-3.6772 0-6.65822-2.98106-6.65822-6.6583 0-.60954.08215-1.20052.23597-1.76214-2.85657.76023-4.96116 3.36465-4.96116 6.4606 0 3.69204 2.99298 6.68504 6.68499 6.68504 3.09602 0 5.70042-2.1046 6.46062-4.9613Zm.2115-1.3049c-.6124.2364-1.2779.366-1.9737.366-3.0283 0-5.48323-2.45498-5.48323-5.4833 0-.69574.12956-1.36121.36589-1.9736.11523-.29842.25567-.58423.41892-.8548.06807-.11277.14002-.22291.21582-.33019C10.004 2.00097 9.93212 2 9.85998 2c-.41211 0-.81677.03172-1.21172.09283C4.88261 2.67555 2 5.93113 2 9.85996 2 14.2009 5.51904 17.72 9.85998 17.72c3.92892 0 7.18452-2.8826 7.76722-6.6483.0611-.395.0928-.7996.0928-1.21174 0-.07214-.001-.14413-.003-.2158-.1073.07575-.2174.14773-.3302.2158-.2706.16324-.5563.30374-.8547.41884Z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- mobile menu button: the icons follow aria-expanded, main.js toggles it -->
                <button type="button" id="mobile-menu-button" aria-expanded="false" aria-controls="js-nav-menu" class="group absolute right-6 inline-flex size-10 items-center justify-center rounded-xl p-2 text-slate-900 ring-1 ring-slate-300 focus-visible:outline-2 focus-visible:outline-white lg:hidden dark:text-white dark:ring-slate-700">
                    <span class="sr-only">Open main menu</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true" class="size-6 group-aria-expanded:hidden">
                        <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true" class="hidden size-6 group-aria-expanded:block">
                        <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </nav>
        </header>
