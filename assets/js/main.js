// Mobile menu: the menu/close icons follow aria-expanded via `group-aria-expanded:*`
const mobileMenuButton = document.getElementById('mobile-menu-button');
const navMenu = document.getElementById('js-nav-menu');

mobileMenuButton?.addEventListener('click', () => {
    const isExpanded = mobileMenuButton.getAttribute('aria-expanded') === 'true';
    mobileMenuButton.setAttribute('aria-expanded', String(!isExpanded));
    navMenu.classList.toggle('hidden', isExpanded);
});

// Syntax highlighting. GitHub light/dark palette; full class names, so Tailwind can find them in this file.
const TOKEN_CLASSES = {
    comment: 'text-[#6e7781] italic dark:text-[#8b949e]',
    string: 'text-[#0a3069] dark:text-[#a5d6ff]',
    keyword: 'text-[#cf222e] dark:text-[#ff7b72]',
    operator: 'text-[#cf222e] dark:text-[#ff7b72]',
    function: 'text-[#8250df] dark:text-[#d2a8ff]',
    type: 'text-[#953800] dark:text-[#ffa657]',
    class: 'text-[#953800] dark:text-[#ffa657]',
    literal: 'text-[#0550ae] dark:text-[#79c0ff]',
    variable: 'text-[#0550ae] dark:text-[#79c0ff]',
    number: 'text-[#0550ae] dark:text-[#79c0ff]',
    constant: 'text-[#0550ae] dark:text-[#79c0ff]',
    punctuation: 'text-[#24292f] dark:text-[#c9d1d9]',
};
const LINE_CLASSES = 'relative block min-h-lh pl-7 [counter-increment:line] before:absolute before:left-0 before:w-4 before:text-right before:text-slate-400 before:content-[counter(line)] dark:before:text-slate-600';

const KEYWORDS = new Set(['abstract', 'and', 'array', 'as', 'break', 'callable', 'case', 'catch', 'class', 'clone', 'const', 'continue', 'declare', 'default', 'die', 'do', 'echo', 'else', 'elseif', 'empty', 'enddeclare', 'endfor', 'endforeach', 'endif', 'endswitch', 'endwhile', 'eval', 'exit', 'extends', 'final', 'finally', 'fn', 'for', 'foreach', 'function', 'global', 'goto', 'if', 'implements', 'include', 'include_once', 'instanceof', 'insteadof', 'interface', 'isset', 'list', 'namespace', 'new', 'or', 'print', 'private', 'protected', 'public', 'readonly', 'require', 'require_once', 'return', 'static', 'switch', 'throw', 'trait', 'try', 'unset', 'use', 'var', 'while', 'xor', 'yield']);
const LITERALS = new Set(['false', 'true', 'null']);
const TYPES = new Set(['bool', 'boolean', 'int', 'integer', 'float', 'double', 'string', 'array', 'object', 'resource', 'mixed', 'void', 'iterable', 'self', 'parent', 'static']);

// One sticky regex, one pass: each alternation group is a token type, tried in this order.
const TOKEN = /(\/\/[^\n]*|#(?!\[)[^\n]*)|(#\[)|("(?:[^"\\]|\\.)*"?|'(?:[^'\\]|\\.)*'?)|(\$\w*)|(\d[0-9a-fA-Fbx.]*)|([a-zA-Z_\\][\w\\]*)|(===|==|!=|<=|>=|=>|\+\+|--|&&|\|\||<<|>>|->|[=+\-*\/%<>!&|^~?:])|(\s+)|([;,()\[\]{}.])|(.)/y;
const TOKEN_TYPES = ['comment', 'punctuation', 'string', 'variable', 'number', 'word', 'operator', 'space', 'punctuation', 'text'];
const CALL_OR_STATIC = /\s*(\(|::)/y;

function wordType(word, text, end) {
    const lower = word.toLowerCase();
    if (KEYWORDS.has(lower)) return 'keyword';
    if (LITERALS.has(lower)) return 'literal';
    if (TYPES.has(lower)) return 'type';
    if (word.length > 1 && /^[A-Z_][A-Z0-9_]*$/.test(word)) return 'constant';
    if (word.includes('\\')) return 'class';
    CALL_OR_STATIC.lastIndex = end;
    const next = CALL_OR_STATIC.exec(text)?.[1];
    return next === '(' ? 'function' : next === '::' ? 'class' : 'text';
}

const escapeHtml = str => str.replace(/[<>&"]/g, c => ({ '<': '&lt;', '>': '&gt;', '&': '&amp;', '"': '&quot;' })[c]);

function highlightCode(codeElement) {
    const code = codeElement.textContent;
    let html = '';
    TOKEN.lastIndex = 0;
    for (let m; (m = TOKEN.exec(code));) {
        const group = m.findIndex((g, i) => i > 0 && g !== undefined);
        let type = TOKEN_TYPES[group - 1];
        if (type === 'word') type = wordType(m[0], code, TOKEN.lastIndex);
        const escaped = escapeHtml(m[0]);
        html += TOKEN_CLASSES[type] ? `<span class="${TOKEN_CLASSES[type]}">${escaped}</span>` : escaped;
    }

    // Line numbers come from a CSS counter, so they stay out of the copied text.
    // ponytail: splits on newlines, so a token spanning lines (a multi-line string) would break; none of our samples has one.
    if (codeElement.classList.contains('js-line-numbers')) {
        const lines = html.split('\n');
        html = lines.map((line, i) => `<span class="${LINE_CLASSES}">${line}${i < lines.length - 1 ? '\n' : ''}</span>`).join('');
    }

    codeElement.innerHTML = html;
}

document.querySelectorAll('.js-code').forEach(highlightCode);

// Copy button: swaps in a check mark for two seconds
const CHECK_ICON = '<svg viewBox="0 0 24 24" fill="none" aria-hidden="true" class="size-4"><path d="M5 14L8.5 17.5L19 6.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';

document.addEventListener('click', async (e) => {
    const btn = e.target.closest('.js-copy-code');
    if (!btn || !navigator.clipboard) return;

    try {
        await navigator.clipboard.writeText(btn.closest('.js-code-block').querySelector('code').textContent);
    } catch (err) {
        return console.error('Copy failed:', err);
    }

    const originalHTML = btn.innerHTML;
    btn.innerHTML = CHECK_ICON;
    btn.disabled = true;
    setTimeout(() => {
        btn.innerHTML = originalHTML;
        btn.disabled = false;
    }, 2000);
});

// Theme: light → dark → system. Runs last so storage errors can't break the code above.
const themeButton = document.querySelector('.js-theme-toggle');
const videoSections = document.querySelectorAll('.js-video-bg');
const darkQuery = matchMedia('(prefers-color-scheme: dark)');
const nextTheme = { light: 'dark', dark: 'system', system: 'light' };
const savedTheme = () => localStorage.theme || 'system';

// The video fades out towards the bottom, or towards the top with data-video-fade="top".
function createVideo(isDark, fade) {
    const video = document.createElement('video');
    video.className = `pointer-events-none absolute top-0 -z-10 size-full ${fade === 'top' ? 'mask-t-from-60%' : 'mask-b-from-60%'} object-cover opacity-0 transition-opacity duration-500 ease-in-out select-none`;
    Object.assign(video, { src: isDark ? 'assets/video/bg-dark.mp4' : 'assets/video/bg-light.mp4', autoplay: true, muted: true, loop: true, playsInline: true, disablePictureInPicture: true });
    video.oncanplay = () => video.classList.replace('opacity-0', isDark ? 'opacity-35' : 'opacity-25');
    return video;
}

function applyTheme(theme) {
    const isDark = theme === 'dark' || (theme === 'system' && darkQuery.matches);

    document.documentElement.classList.toggle('dark', isDark);

    if (themeButton) {
        themeButton.dataset.theme = theme;
        themeButton.setAttribute('aria-label', `Switch to ${nextTheme[theme]} theme`);
    }

    videoSections.forEach((section) => {
        section.querySelector('video')?.remove();
        section.prepend(createVideo(isDark, section.dataset.videoFade));
    });
}

themeButton?.addEventListener('click', () => {
    localStorage.theme = nextTheme[savedTheme()];
    applyTheme(localStorage.theme);
});

applyTheme(savedTheme());
darkQuery.addEventListener('change', () => {
    if (savedTheme() === 'system') applyTheme('system');
});
