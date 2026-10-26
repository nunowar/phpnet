<?php

require __DIR__ . '/includes/helpers.php';

$sidebar = [
    'Basic syntax' => ['PHP tags', 'Escaping from HTML', 'Instruction separation', 'Comments'],
    'Types' => ['Introduction', 'Type System', 'NULL', 'Booleans', 'Integers', 'Floating point numbers', 'Strings', 'Numeric strings', 'Arrays', 'Objects', 'Enumerations', 'Resources', 'Callbacks / Callables', 'Mixed', 'Void', 'Never', 'Relative class types', 'Singleton types', 'Iterables', 'Type declarations', 'Type Juggling'],
    'Variables' => ['Basics', 'Predefined Variables', 'Variable scope', 'Variable variables', 'Variables From External Sources'],
    'Constants' => ['Syntax', 'Predefined constants', 'Magic constants'],
];

$toc = [
    'Introduction' => [],
    'PHP tags' => ['PHP Opening and Closing Tags', 'PHP Code Only File'],
    'Escaping from HTML' => ['Embedding PHP in HTML', 'Advanced escaping using conditions', 'Adding middleware'],
    'Instruction separation' => ['Example showing the closing tag encompassing the trailing newline', 'Examples of entering and exiting the PHP parser'],
    'Comments' => ['Multi line comments', 'One Line Comments'],
];
$tocLink = 'text-zinc-500 hover:text-zinc-700 aria-[current=page]:font-medium aria-[current=page]:text-brand-500 dark:text-slate-400 dark:hover:text-slate-100 dark:aria-[current=page]:text-brand-400';

$example = <<<'PHP'
    echo "Hello world\n";

    // ... more code

    echo "Last statement\n";

    // the script ends here with no PHP closing tag
    PHP;

$active = 'Documentation';
require __DIR__ . '/includes/header.php';
?>
        <div class="dark:bg-slate-900/30">
            <div class="relative z-10 mx-auto grid max-w-7xl grid-cols-12 gap-4 px-6 pt-10 lg:gap-6 lg:px-0 xl:gap-x-10">
                <!-- left sidebar -->
                <div class="col-span-3 border-r border-zinc-950/10 lg:pb-6 dark:border-slate-800">
                    <nav aria-label="Documentation" class="sticky top-22 z-20 hidden space-y-8 px-8 xl:block">
                        <?php foreach ($sidebar as $heading => $links): ?>
                            <div>
                                <h2 class="text-base/7 font-semibold text-pretty text-zinc-950 sm:text-sm/6 dark:text-white"><?= $heading ?></h2>
                                <ul class="mt-4 flex flex-col gap-4 border-l border-zinc-950/10 text-base/7 text-zinc-700 sm:mt-3 sm:gap-3 sm:text-sm/6 dark:border-slate-800 dark:text-slate-400">
                                    <?php foreach ($links as $link): ?>
                                        <li class="-ml-px flex border-l border-transparent pl-4 hover:text-zinc-950 hover:not-has-aria-[current=page]:border-zinc-400 has-aria-[current=page]:border-l-2 has-aria-[current=page]:border-brand-500 dark:hover:text-white">
                                            <a href="#" class="aria-[current=page]:font-medium aria-[current=page]:text-zinc-950 dark:aria-[current=page]:text-white"<?= $link === 'PHP tags' ? ' aria-current="page"' : '' ?>><?= $link ?></a>
                                        </li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        <?php endforeach ?>
                    </nav>
                </div>

                <!-- content -->
                <section class="col-span-12 lg:col-span-9 xl:col-span-6 [&_p_code]:rounded-md [&_p_code]:bg-zinc-200/50 [&_p_code]:px-1 [&_p_code]:py-0.5 [&_p_code]:text-sm dark:[&_p_code]:bg-slate-800">
                    <h1 class="mb-6 pb-3 text-[2rem]/[1.2] font-bold">Basic syntax</h1>
                    <p class="mb-5 leading-7">PHP (recursive acronym for PHP: Hypertext Preprocessor) is a widely-used open source general-purpose scripting language that is especially suited for web development and can be embedded into HTML.</p>
                    <h2 class="mt-10 mb-5 pb-2 text-[1.75rem]/[1.3] font-semibold">PHP tags</h2>
                    <p class="mb-5 leading-7">When PHP processes a file, it recognizes opening and closing tags, <code>&lt;?php</code> and <code>?&gt;</code>, to define the boundaries of PHP code execution. Content outside these tags is ignored by the PHP parser, allowing PHP to seamlessly embed in various document types.</p>
                    <p class="mb-5 leading-7">A whitespace character (space, tab, or newline) must follow <code>&lt;?php</code> to ensure proper token separation. Omitting this whitespace will result in a syntax error.</p>
                    <p class="mb-5 leading-7">PHP also includes the short echo tag <code>&lt;?=</code>, which is shorthand for <code>&lt;?php echo</code>.</p>

                    <h3 class="mt-8 mb-4 text-2xl/[1.4] font-semibold">Example #1 PHP Code Only File</h3>
                    <?php code_block($example) ?>

                    <p class="mb-5 leading-7">Short tags (example three) are available by default but can be disabled either via the <a href="ini.core.php#ini.short-open-tag" class="text-brand-500 underline-offset-2 hover:underline dark:text-brand-400">short_open_tag</a> <var>php.ini</var> configuration file directive, or are disabled by default if PHP is built with the <strong>--disable-short-tags</strong> configuration.</p>
                    <blockquote class="mb-6 rounded-2xl border-2 border-brand-500 bg-white px-4 py-3 dark:bg-slate-800">
                        <p class="mb-2 leading-7"><strong>Note</strong>:</p>
                        <p class="mb-2 leading-7">As short tags can be disabled it is recommended to only use the normal tags (<code>&lt;?php ?&gt;</code> and <code>&lt;?= ?&gt;</code>) to maximise compatibility.</p>
                    </blockquote>

                    <p class="mb-5 leading-7">If a file ends with PHP code, it is preferable to omit the PHP closing tag at the end of the file. This prevents accidental whitespace or new lines being added after the PHP closing tag, which may cause unwanted effects because PHP will start output buffering when there is no intention from the programmer to send any output at that point in the script.</p>

                    <h3 class="mt-8 mb-4 text-2xl/[1.4] font-semibold">Example #2 PHP Code Only File</h3>
                    <?php code_block($example) ?>
                </section>

                <!-- right sidebar -->
                <div class="hidden border-l border-zinc-950/10 xl:col-span-3 xl:block xl:pb-10 dark:border-slate-800">
                    <div class="sticky top-28 pl-10">
                        <nav aria-labelledby="on-this-page-title" class="w-56">
                            <h2 id="on-this-page-title" class="text-sm font-semibold text-zinc-900 dark:text-white">On this page</h2>
                            <ol role="list" class="mt-4 space-y-3 text-sm">
                                <?php foreach ($toc as $heading => $subheadings): ?>
                                    <li>
                                        <h3><a href="#" class="<?= $tocLink ?>"<?= $heading === 'Introduction' ? ' aria-current="page"' : '' ?>><?= $heading ?></a></h3>
                                        <?php if ($subheadings): ?>
                                            <ol role="list" class="mt-2 mb-4 space-y-2 pl-5">
                                                <?php foreach ($subheadings as $subheading): ?>
                                                    <li><a href="#" class="<?= $tocLink ?>"><?= $subheading ?></a></li>
                                                <?php endforeach ?>
                                            </ol>
                                        <?php endif ?>
                                    </li>
                                <?php endforeach ?>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
<?php require __DIR__ . '/includes/footer.php'; ?>
