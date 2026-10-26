<?php

// Appends the file's modification time so browsers fetch the new version after each build.
function asset(string $path): string
{
    return $path . '?v=' . filemtime(__DIR__ . '/' . $path);
}

function site_header(string $active = ''): void
{
    $nav = ['Downloads' => '#', 'Documentation' => 'docs.php', 'Get Involved' => '#', 'Help' => '#'];

    // Shared by the header's selects, search button and theme toggle.
    $control = 'rounded-xl bg-white/80 outline-1 -outline-offset-1 outline-zinc-300 focus:ring-2 focus:ring-zinc-950/5 lg:hover:ring-2 lg:hover:ring-zinc-950/5 dark:bg-slate-900 dark:text-white dark:outline-slate-800 dark:focus:ring-slate-800/60 lg:dark:hover:ring-slate-800/60';
    $select = "$control col-start-1 row-start-1 h-9 w-full appearance-none pr-6 pl-3 text-base text-zinc-900 sm:text-sm/6 dark:*:bg-zinc-800";
    $chevron = '<svg viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-zinc-500 sm:size-4 dark:text-zinc-400"><path d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" fill-rule="evenodd" /></svg>';
    ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>PHP is Awesome 🔥</title>
        <link rel="icon" type="image/svg+xml" sizes="any" href="favicon.svg" />
        <link rel="icon" type="image/png" sizes="196x196" href="favicon-196x196.png" />
        <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png" />
        <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png" />
        <link rel="shortcut icon" href="favicon.ico" />
        <link rel="stylesheet" href="<?= asset('style.css') ?>" />
        <script>
            document.documentElement.classList.toggle('dark', localStorage.theme === 'dark' || (localStorage.theme !== 'light' && matchMedia('(prefers-color-scheme: dark)').matches));
        </script>
    </head>
    <body class="relative bg-white text-zinc-800 antialiased dark:bg-slate-950 dark:text-white">
        <!-- header -->
        <header class="sticky top-0 z-50 w-full bg-white/80 py-3 shadow-2xs backdrop-blur-md dark:bg-slate-950/50">
            <nav class="relative mx-auto flex w-full max-w-7xl px-6 lg:px-8">
                <a href="./" aria-label="PHP" class="mr-6">
                    <svg viewBox="0 -1 100 50" fill="currentColor" aria-hidden="true" class="inline-block h-10 text-brand-500 dark:text-white">
                        <path d="m7.579 10.123 14.204 0c4.169 0.035 7.19 1.237 9.063 3.604 1.873 2.367 2.491 5.6 1.855 9.699-0.247 1.873-0.795 3.71-1.643 5.512-0.813 1.802-1.943 3.427-3.392 4.876-1.767 1.837-3.657 3.003-5.671 3.498-2.014 0.495-4.099 0.742-6.254 0.742l-6.36 0-2.014 10.07-7.367 0 7.579-38.001 0 0m6.201 6.042-3.18 15.9c0.212 0.035 0.424 0.053 0.636 0.053 0.247 0 0.495 0 0.742 0 3.392 0.035 6.219-0.3 8.48-1.007 2.261-0.742 3.781-3.321 4.558-7.738 0.636-3.71 0-5.848-1.908-6.413-1.873-0.565-4.222-0.83-7.049-0.795-0.424 0.035-0.83 0.053-1.219 0.053-0.353 0-0.724 0-1.113 0l0.053-0.053" />
                        <path d="m41.093 0 7.314 0-2.067 10.123 6.572 0c3.604 0.071 6.289 0.813 8.056 2.226 1.802 1.413 2.332 4.099 1.59 8.056l-3.551 17.649-7.42 0 3.392-16.854c0.353-1.767 0.247-3.021-0.318-3.763-0.565-0.742-1.784-1.113-3.657-1.113l-5.883-0.053-4.346 21.783-7.314 0 7.632-38.054 0 0" />
                        <path d="m70.412 10.123 14.204 0c4.169 0.035 7.19 1.237 9.063 3.604 1.873 2.367 2.491 5.6 1.855 9.699-0.247 1.873-0.795 3.71-1.643 5.512-0.813 1.802-1.943 3.427-3.392 4.876-1.767 1.837-3.657 3.003-5.671 3.498-2.014 0.495-4.099 0.742-6.254 0.742l-6.36 0-2.014 10.07-7.367 0 7.579-38.001 0 0m6.201 6.042-3.18 15.9c0.212 0.035 0.424 0.053 0.636 0.053 0.247 0 0.495 0 0.742 0 3.392 0.035 6.219-0.3 8.48-1.007 2.261-0.742 3.781-3.321 4.558-7.738 0.636-3.71 0-5.848-1.908-6.413-1.873-0.565-4.222-0.83-7.049-0.795-0.424 0.035-0.83 0.053-1.219 0.053-0.353 0-0.724 0-1.113 0l0.053-0.053" />
                    </svg>
                </a>

                <div id="js-nav-menu" class="mt-16 -ml-26 hidden flex-1 flex-col items-center justify-between border-t border-zinc-200 pt-5 lg:mt-0 lg:ml-0 lg:flex lg:flex-row lg:border-0 lg:pt-0 dark:border-slate-800">
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
                        <button type="button" class="<?= $control ?> flex h-9 shrink-0 cursor-pointer items-center px-2.5 text-base whitespace-nowrap text-zinc-500 sm:text-sm/6 lg:w-60">
                            <svg fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="mr-2 size-4.5 shrink-0">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                            Search documentation...
                            <kbd class="mr-0.5 ml-auto font-sans text-xs text-zinc-500 *:mr-0.5 *:font-sans dark:text-slate-500"><kbd>⌘</kbd><kbd>K</kbd></kbd>
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
                        <button type="button" data-theme="system" aria-label="Switch to light theme" class="js-theme-toggle group <?= $control ?> flex size-9 cursor-pointer items-center px-2.5 text-zinc-500">
                            <svg width="20" height="20" fill="none" viewBox="0 0 20 20" aria-hidden="true" class="hidden group-data-[theme=light]:block">
                                <path fill="currentColor" d="M9.52734 16.7852h1.24996v2.5195H9.52734v-2.5195Zm-3.62304-1.501-1.78125 1.7812-.88477-.8838.44238-.4414.89746-.8984.44239-.4414.88379.8838Zm9.8223-.4424 1.3388 1.3398-.8838.8838-1.7812-1.7812.8838-.8838.4424.4414ZM6.61621 6.61621c1.95259-1.95249 5.11869-1.9524 7.07129 0 1.9526 1.95264 1.9526 5.11869 0 7.07129-1.9526 1.9527-5.11863 1.9527-7.07129 0-1.95241-1.9526-1.95253-5.11871 0-7.07129ZM12.8037 7.5C11.3393 6.03577 8.96445 6.03565 7.5 7.5c-1.46441 1.46444-1.46424 3.8393 0 5.3037 1.46451 1.4645 3.8393 1.4645 5.3037 0 1.4645-1.4644 1.4645-3.8392 0-5.3037ZM3.51953 9.52734v1.24996H1V9.52734h2.51953Zm15.78517 0v1.24996h-2.5195V9.52734h2.5195ZM5.9043 5.02051l-.88379.88379-1.78223-1.78223.88379-.88379L5.9043 5.02051Zm11.1611-.89746L15.2842 5.9043l-.8838-.88379.4414-.44239.8984-.89746.4414-.44238.8838.88477ZM9.52734 1h1.24996v2.51953H9.52734V1Z" />
                            </svg>
                            <svg width="20" height="20" fill="none" viewBox="0 0 20 20" aria-hidden="true" class="hidden group-data-[theme=system]:block">
                                <path fill="currentColor" fill-rule="evenodd" d="M16.541 9.86c0 3.6898-2.9912 6.681-6.681 6.681V3.179c3.6898 0 6.681 2.99119 6.681 6.681ZM9.86 17.72c4.3409 0 7.86-3.5191 7.86-7.86C17.72 5.51904 14.2009 2 9.86 2 5.51904 2 2 5.51904 2 9.86c0 4.3409 3.51904 7.86 7.86 7.86Z" clip-rule="evenodd" />
                            </svg>
                            <svg width="20" height="20" fill="none" viewBox="0 0 20 20" aria-hidden="true" class="hidden group-data-[theme=dark]:block">
                                <path fill="currentColor" fill-rule="evenodd" d="M16.3206 11.5837c-.5616.1539-1.1526.2361-1.7622.2361-3.6772 0-6.65822-2.98106-6.65822-6.6583 0-.60954.08215-1.20052.23597-1.76214-2.85657.76023-4.96116 3.36465-4.96116 6.4606 0 3.69204 2.99298 6.68504 6.68499 6.68504 3.09602 0 5.70042-2.1046 6.46062-4.9613Zm.2115-1.3049c-.6124.2364-1.2779.366-1.9737.366-3.0283 0-5.48323-2.45498-5.48323-5.4833 0-.69574.12956-1.36121.36589-1.9736.11523-.29842.25567-.58423.41892-.8548.06807-.11277.14002-.22291.21582-.33019C10.004 2.00097 9.93212 2 9.85998 2c-.41211 0-.81677.03172-1.21172.09283C4.88261 2.67555 2 5.93113 2 9.85996 2 14.2009 5.51904 17.72 9.85998 17.72c3.92892 0 7.18452-2.8826 7.76722-6.6483.0611-.395.0928-.7996.0928-1.21174 0-.07214-.001-.14413-.003-.2158-.1073.07575-.2174.14773-.3302.2158-.2706.16324-.5563.30374-.8547.41884Z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- mobile menu button: the icons follow aria-expanded, main.js toggles it -->
                <button type="button" id="mobile-menu-button" aria-expanded="false" aria-controls="js-nav-menu" class="group absolute right-6 inline-flex size-10 items-center justify-center rounded-xl p-2 text-zinc-900 ring-1 ring-zinc-300 focus-visible:outline-2 focus-visible:outline-white lg:hidden dark:text-white dark:ring-slate-700">
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
<?php
}

function site_footer(): void
{
    $columns = [
        [
            'Contribute' => ['Get Involved', "Developer's Guide", 'Issue Tracker', 'Brand Guidelines', 'Code of Conduct'],
            'Learn' => ['Documentation', "Beginner's Guide", 'Tutorials & Examples', 'Audio/Visual Talks'],
        ],
        [
            'The PHP Foundation' => ['About the Foundation', 'Blog PHP', 'PHP Jobs'],
            'Legal' => ['Privacy Policy', 'Cookie Preferences'],
        ],
    ];
    ?>
        <footer class="relative isolate z-10 border-t border-zinc-900/10 bg-zinc-50 pb-8 dark:border-slate-800 dark:bg-slate-900/30">
            <div class="mx-auto max-w-7xl px-4 pt-16 pb-8 sm:pt-24 lg:px-8 lg:pt-28">
                <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                    <div class="space-y-8">
                        <a href="./" aria-label="PHP" class="inline-block h-10">
                            <svg viewBox="0 -1 100 50" fill="currentColor" aria-hidden="true" class="inline-block h-10 text-zinc-800 dark:text-white">
                                <path d="m7.579 10.123 14.204 0c4.169 0.035 7.19 1.237 9.063 3.604 1.873 2.367 2.491 5.6 1.855 9.699-0.247 1.873-0.795 3.71-1.643 5.512-0.813 1.802-1.943 3.427-3.392 4.876-1.767 1.837-3.657 3.003-5.671 3.498-2.014 0.495-4.099 0.742-6.254 0.742l-6.36 0-2.014 10.07-7.367 0 7.579-38.001 0 0m6.201 6.042-3.18 15.9c0.212 0.035 0.424 0.053 0.636 0.053 0.247 0 0.495 0 0.742 0 3.392 0.035 6.219-0.3 8.48-1.007 2.261-0.742 3.781-3.321 4.558-7.738 0.636-3.71 0-5.848-1.908-6.413-1.873-0.565-4.222-0.83-7.049-0.795-0.424 0.035-0.83 0.053-1.219 0.053-0.353 0-0.724 0-1.113 0l0.053-0.053" />
                                <path d="m41.093 0 7.314 0-2.067 10.123 6.572 0c3.604 0.071 6.289 0.813 8.056 2.226 1.802 1.413 2.332 4.099 1.59 8.056l-3.551 17.649-7.42 0 3.392-16.854c0.353-1.767 0.247-3.021-0.318-3.763-0.565-0.742-1.784-1.113-3.657-1.113l-5.883-0.053-4.346 21.783-7.314 0 7.632-38.054 0 0" />
                                <path d="m70.412 10.123 14.204 0c4.169 0.035 7.19 1.237 9.063 3.604 1.873 2.367 2.491 5.6 1.855 9.699-0.247 1.873-0.795 3.71-1.643 5.512-0.813 1.802-1.943 3.427-3.392 4.876-1.767 1.837-3.657 3.003-5.671 3.498-2.014 0.495-4.099 0.742-6.254 0.742l-6.36 0-2.014 10.07-7.367 0 7.579-38.001 0 0m6.201 6.042-3.18 15.9c0.212 0.035 0.424 0.053 0.636 0.053 0.247 0 0.495 0 0.742 0 3.392 0.035 6.219-0.3 8.48-1.007 2.261-0.742 3.781-3.321 4.558-7.738 0.636-3.71 0-5.848-1.908-6.413-1.873-0.565-4.222-0.83-7.049-0.795-0.424 0.035-0.83 0.053-1.219 0.053-0.353 0-0.724 0-1.113 0l0.053-0.053" />
                            </svg>
                        </a>

                        <p class="text-sm/6 text-balance text-zinc-600 dark:text-slate-300">The PHP Foundation is a collective of people and organizations, united in the mission to ensure the long-term prosperity of the PHP language.</p>

                        <div class="flex gap-x-6">
                            <a href="https://x.com/official_php" target="_blank" rel="noopener noreferrer" class="text-zinc-600 hover:text-zinc-800 dark:text-slate-300 dark:hover:text-white">
                                <span class="sr-only">X</span>
                                <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="size-6">
                                    <path d="M13.6823 10.6218L20.2391 3H18.6854L12.9921 9.61788L8.44486 3H3.2002L10.0765 13.0074L3.2002 21H4.75404L10.7663 14.0113L15.5685 21H20.8131L13.6819 10.6218H13.6823ZM11.5541 13.0956L10.8574 12.0991L5.31391 4.16971H7.70053L12.1742 10.5689L12.8709 11.5655L18.6861 19.8835H16.2995L11.5541 13.096V13.0956Z" />
                                </svg>
                            </a>
                            <a href="https://www.linkedin.com/company/phpnet/" target="_blank" rel="noopener noreferrer" class="text-zinc-600 hover:text-zinc-800 dark:text-slate-300 dark:hover:text-white">
                                <span class="sr-only">Linkedin</span>
                                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" class="size-6">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9428 1.75H12.0572C14.2479 1.74999 15.9686 1.74998 17.312 1.93059C18.6886 2.11568 19.7809 2.50271 20.6391 3.36091C21.4973 4.21911 21.8843 5.31137 22.0694 6.68802C22.25 8.03144 22.25 9.75214 22.25 11.9428V12.0572C22.25 14.2479 22.25 15.9686 22.0694 17.312C21.8843 18.6886 21.4973 19.7809 20.6391 20.6391C19.7809 21.4973 18.6886 21.8843 17.312 22.0694C15.9686 22.25 14.2479 22.25 12.0572 22.25H11.9428C9.7521 22.25 8.03144 22.25 6.68802 22.0694C5.31137 21.8843 4.21911 21.4973 3.36091 20.6391C2.50272 19.7809 2.11568 18.6886 1.93059 17.312C1.74998 15.9686 1.74999 14.2479 1.75 12.0572V12.0572V11.9428V11.9428C1.74999 9.75211 1.74998 8.03144 1.93059 6.68802C2.11568 5.31137 2.50272 4.21911 3.36091 3.36091C4.21911 2.50271 5.31137 2.11568 6.68802 1.93059C8.03143 1.74998 9.75214 1.74999 11.9428 1.75ZM8.00195 10.5C8.00195 9.94771 7.55424 9.5 7.00195 9.5C6.44967 9.5 6.00195 9.94771 6.00195 10.5L6.00195 17C6.00195 17.5523 6.44967 18 7.00195 18C7.55424 18 8.00195 17.5523 8.00195 17L8.00195 10.5ZM11.002 9C11.4073 9 11.7564 9.2412 11.9134 9.58791C12.5213 9.215 13.2365 9 14.002 9C16.2111 9 18.002 10.7909 18.002 13V17C18.002 17.5523 17.5542 18 17.002 18C16.4497 18 16.002 17.5523 16.002 17V13C16.002 11.8954 15.1065 11 14.002 11C12.8974 11 12.002 11.8954 12.002 13L12.002 17C12.002 17.5523 11.5542 18 11.002 18C10.4497 18 10.002 17.5523 10.002 17L10.002 10C10.002 9.44771 10.4497 9 11.002 9ZM8.25977 7C8.25977 7.69036 7.70012 8.25 7.00977 8.25H7.00078C6.31043 8.25 5.75078 7.69036 5.75078 7C5.75078 6.30964 6.31043 5.75 7.00078 5.75H7.00977C7.70012 5.75 8.25977 6.30964 8.25977 7Z" fill="currentColor" />
                                </svg>
                            </a>
                            <a href="https://fosstodon.org/@php" target="_blank" rel="noopener noreferrer" class="text-zinc-600 hover:text-zinc-800 dark:text-slate-300 dark:hover:text-white">
                                <span class="sr-only">@php@fosstodon.org</span>
                                <svg fill="none" viewBox="0 0 24 24" aria-hidden="true" class="size-6"><path fill="currentColor" d="M21.5 6.5c-.3-2.2-2.3-3.9-4.6-4.2-.4 0-1.9-.3-5.3-.3s-4.2.2-4.6.3c-2.2.3-4.3 1.9-4.8 4C2 7.6 2 8.8 2 9.9a38.5 38.5 0 0 0 .8 7.9c.4 2 2.4 3.5 4.2 4.2a11.6 11.6 0 0 0 7 .1l1.5-.6v-1.6a19 19 0 0 1-4.1.4c-2.3 0-3-1-3.2-1.5a4.7 4.7 0 0 1-.2-1.3c1.3.3 2.7.5 4 .5h1c1.3 0 2.7-.1 4-.4h.2a5 5 0 0 0 4.3-4.8V6.5Zm-3.3 7.9H16V9c0-1.1-.4-1.7-1.4-1.7-1 0-1.6.7-1.6 2v3h-2.2v-3c0-1.3-.5-2-1.6-2-1 0-1.4.6-1.4 1.7v5.3H5.6V8.9c0-1.1.3-2 .9-2.6a3 3 0 0 1 2.3-1c1.2 0 2 .4 2.6 1.2l.5 1 .6-1c.5-.8 1.4-1.2 2.5-1.2 1 0 1.8.3 2.4 1 .6.6.8 1.5.8 2.6v5.5Z" /></svg>
                            </a>
                            <a href="https://github.com/php/?q=doc" target="_blank" rel="noopener noreferrer" class="text-zinc-600 hover:text-zinc-800 dark:text-slate-300 dark:hover:text-white">
                                <span class="sr-only">GitHub</span>
                                <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="size-6">
                                    <path d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" fill-rule="evenodd" />
                                </svg>
                            </a>
                        </div>

                        <a href="https://thephp.foundation/sponsor/" class="inline-flex min-h-10 w-full items-center justify-center rounded-full bg-brand-500 px-5 text-sm font-semibold text-white hover:bg-brand-500/90 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-zinc-800 sm:w-auto">Donate</a>
                    </div>

                    <div class="mt-16 grid grid-cols-2 items-start gap-8 pb-8 xl:col-span-2 xl:mt-0">
                        <?php foreach ($columns as $pair): ?>
                            <div class="grid gap-10 md:grid-cols-2 md:gap-8">
                                <?php foreach ($pair as $heading => $links): ?>
                                    <div>
                                        <h3 class="text-sm/6 font-semibold text-zinc-900 dark:text-white"><?= $heading ?></h3>
                                        <ul role="list" class="mt-6 space-y-4">
                                            <?php foreach ($links as $link): ?>
                                                <li><a href="#" class="text-sm/6 text-zinc-600 underline underline-offset-2 hover:text-zinc-900 hover:no-underline dark:text-slate-300 dark:hover:text-white"><?= $link ?></a></li>
                                            <?php endforeach ?>
                                        </ul>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>

                <div class="flex flex-col items-center gap-2 border-t border-zinc-900/10 pt-8 text-center text-sm/6 text-zinc-600 sm:mt-20 sm:flex-row sm:justify-center sm:gap-3 lg:mt-24 dark:border-slate-800 dark:text-slate-400">
                    <p>© 2001–<?= date('Y') ?> The PHP Group. All rights reserved.</p>
                    <span aria-hidden="true" class="hidden sm:inline">·</span>
                    <p>Designed by <a href="https://nunoguerra.com" target="_blank" rel="noopener" class="font-medium text-zinc-900 underline-offset-2 hover:underline dark:text-white">Nuno Guerra</a></p>
                </div>
            </div>
        </footer>

        <!-- noise -->
        <svg aria-hidden="true" class="pointer-events-none absolute top-0 size-full opacity-8 dark:opacity-40">
            <defs>
                <filter id="noise-filter">
                    <feTurbulence type="turbulence" baseFrequency="1" numOctaves="1" stitchTiles="stitch" result="noise"></feTurbulence>
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 1 0" result="coloredNoise"></feColorMatrix>
                </filter>
            </defs>
            <rect width="100%" height="100%" filter="url(#noise-filter)"></rect>
        </svg>

        <script src="<?= asset('main.js') ?>" defer></script>
    </body>
</html>
<?php
}

// A code sample with a copy button. With a $title it gets a header bar (index), without one the button floats (docs).
function code_block(string $code, ?string $title = null, bool $lineNumbers = false): void
{
    ?>
<div class="js-code-block relative overflow-hidden rounded-2xl border border-zinc-200 bg-white text-zinc-800 dark:text-white <?= $title ? 'dark:border-black/10 dark:bg-zinc-950/25' : 'mb-6 dark:border-slate-800/60 dark:bg-slate-800/60' ?>">
    <div class="flex items-center gap-2 px-3 py-2 text-sm font-semibold <?= $title ? 'justify-between border-b border-zinc-200 dark:border-slate-800/60' : 'absolute top-0 right-0' ?>">
        <?php if ($title): ?>
            <span><?= $title ?></span>
        <?php endif ?>
        <button type="button" aria-label="Copy code" class="js-copy-code cursor-pointer rounded-lg p-2 hover:bg-zinc-100 dark:hover:bg-slate-900">
            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" class="size-4">
                <path d="M9 15C9 12.1716 9 10.7574 9.87868 9.87868C10.7574 9 12.1716 9 15 9L16 9C18.8284 9 20.2426 9 21.1213 9.87868C22 10.7574 22 12.1716 22 15V16C22 18.8284 22 20.2426 21.1213 21.1213C20.2426 22 18.8284 22 16 22H15C12.1716 22 10.7574 22 9.87868 21.1213C9 20.2426 9 18.8284 9 16L9 15Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M16.9999 9C16.9975 6.04291 16.9528 4.51121 16.092 3.46243C15.9258 3.25989 15.7401 3.07418 15.5376 2.90796C14.4312 2 12.7875 2 9.5 2C6.21252 2 4.56878 2 3.46243 2.90796C3.25989 3.07417 3.07418 3.25989 2.90796 3.46243C2 4.56878 2 6.21252 2 9.5C2 12.7875 2 14.4312 2.90796 15.5376C3.07417 15.7401 3.25989 15.9258 3.46243 16.092C4.51121 16.9528 6.04291 16.9975 9 16.9999" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
    </div>
    <pre class="flex min-h-full text-xs/loose whitespace-pre-wrap sm:text-sm/loose"><code class="js-code h-full flex-1 overflow-auto p-4 text-zinc-400<?= $lineNumbers ? ' js-line-numbers [counter-reset:line]' : '' ?>"><?= htmlspecialchars($code) ?></code></pre>
</div>
<?php
}
