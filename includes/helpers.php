<?php

// Appends the file's modification time so browsers fetch the new version after each build.
function asset(string $path): string
{
    return $path . '?v=' . filemtime(dirname(__DIR__) . '/' . $path);
}

// A code sample with a copy button. With a $title it gets a header bar (index), without one the button floats (docs).
function code_block(string $code, ?string $title = null, bool $lineNumbers = false): void
{
    ?>
<div class="js-code-block relative overflow-hidden rounded-2xl border border-slate-200 bg-white text-slate-800 dark:text-white <?= $title ? 'dark:border-black/10 dark:bg-slate-950/25' : 'mb-6 dark:border-slate-800/60 dark:bg-slate-800/60' ?>">
    <div class="flex items-center gap-2 px-3 py-2 text-sm font-semibold <?= $title ? 'justify-between border-b border-slate-200 dark:border-slate-800/60' : 'absolute top-0 right-0' ?>">
        <?php if ($title): ?>
            <span><?= $title ?></span>
        <?php endif ?>
        <button type="button" aria-label="Copy code" class="js-copy-code cursor-pointer rounded-lg p-2 hover:bg-slate-100 dark:hover:bg-slate-900">
            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" class="size-4">
                <path d="M9 15C9 12.1716 9 10.7574 9.87868 9.87868C10.7574 9 12.1716 9 15 9L16 9C18.8284 9 20.2426 9 21.1213 9.87868C22 10.7574 22 12.1716 22 15V16C22 18.8284 22 20.2426 21.1213 21.1213C20.2426 22 18.8284 22 16 22H15C12.1716 22 10.7574 22 9.87868 21.1213C9 20.2426 9 18.8284 9 16L9 15Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M16.9999 9C16.9975 6.04291 16.9528 4.51121 16.092 3.46243C15.9258 3.25989 15.7401 3.07418 15.5376 2.90796C14.4312 2 12.7875 2 9.5 2C6.21252 2 4.56878 2 3.46243 2.90796C3.25989 3.07417 3.07418 3.25989 2.90796 3.46243C2 4.56878 2 6.21252 2 9.5C2 12.7875 2 14.4312 2.90796 15.5376C3.07417 15.7401 3.25989 15.9258 3.46243 16.092C4.51121 16.9528 6.04291 16.9975 9 16.9999" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
    </div>
    <pre class="flex min-h-full text-xs/loose whitespace-pre-wrap sm:text-sm/loose"><code class="js-code h-full flex-1 overflow-auto p-4 text-slate-400<?= $lineNumbers ? ' js-line-numbers [counter-reset:line]' : '' ?>"><?= htmlspecialchars($code) ?></code></pre>
</div>
<?php
}
