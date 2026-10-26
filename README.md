# A new homepage for php.net

A year ago I won the PHP Foundation's design contest for the [PHP 8.5 release page](https://www.php.net/releases/8.5/en.php). The Foundation shipped that design on the release page itself, but php.net kept its existing look.

This year I went further: a complete restyle of the php.net homepage, following the visual line of the 8.5 design. The code is here for the Foundation to use if they want to implement it.

## What's inside

- `index.php`: the homepage, built around PHP 8.6 with a "Road to PHP 9" section
- `docs.php`: a documentation page in the same style
- `partials.php`: the shared header, footer and code block
- `icons.php`: brand marks from [Simple Icons](https://simpleicons.org)
- `src/app.css` → `style.css`: Tailwind CSS 4 with native utilities, compiled

Every figure on the page (usage share, package counts, companies, Foundation numbers) was checked against a primary source in October 2026. Each one carries a dated comment in `index.php` next to the data it feeds, so it is easy to see what needs refreshing.

## Running it

The compiled `style.css` is committed, so any PHP server works:

```sh
php -S localhost:8000
```

To change styles, rebuild the stylesheet:

```sh
npm install
npm run dev     # watch
npm run build   # minified
```

## Credits

Design and code by [Nuno Guerra](https://nunoguerra.com). Brand marks belong to their owners. Icons from [Hugeicons](https://hugeicons.com) (MIT) and Simple Icons (CC0).
