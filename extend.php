<?php

/*
 * This file is part of Flarum.
 *
 * (c) Toby Zerner <toby.zerner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Flarum\Extend;


// get all locale files
$path = __DIR__.'/locale/';
$extends = [
    new Flarum\Extend\LanguagePack
];
foreach (scandir($path) as $f) {
    if ($f == '.' || $f == '..')
        continue;
    foreach (scandir($path.$f) as $ff) {
        if ($ff == '.' || $ff == '..')
            continue;
        array_push($extends, new Extend\Locales($path.$f.'/'.$ff));
    }
}

return $extends;
