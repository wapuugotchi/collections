<?php

$files = scandir('.');

$template = "---
slug: {{DIR_NAME}}
name: {{TITLE}}
key: {{UUID}}
priority: 100
price: 50
---";

for ($i = 2; $i < count($files); $i++) {
    if (!is_dir($files[$i])) {
        continue;
    }

    renameFiles($files[$i]);

    if (file_exists($files[$i] . '/meta.md')) {
        continue;
    }

    $md = $template;
    $md = str_replace('{{DIR_NAME}}', $files[$i], $md);
    $title_parts = explode('_', $files[$i]);
    for ($k = 0; $k < count($title_parts); $k++) {
        $title_parts[$k] = ucfirst($title_parts[$k]);
    }
    $title = implode($title_parts, ' ');
    $md = str_replace('{{TITLE}}', $title, $md);
    $md = str_replace('{{UUID}}', guidv4(), $md);

    file_put_contents($files[$i] . '/meta.md', $md);
}

function renameFiles($dirPath) {
    $files = scandir($dirPath);
    for ($i = 0; $i < count($files); $i++) {
        if (str_contains($files[$i], 'preview.png')) {
            $source = "$dirPath/$files[$i]";
            $dest = "$dirPath/preview.png";
            rename($source, $dest);
            continue;
        }
        if (str_contains($files[$i], 'preview.svg')) {
            $source = "$dirPath/$files[$i]";
            $dest = "$dirPath/preview.svg";
            rename($source, $dest);
            continue;
        }
        if (str_contains($files[$i], '.svg')) {
            $source = "$dirPath/$files[$i]";
            $dest = "$dirPath/image.svg";
            rename($source, $dest);
        }
    }
}

function guidv4($data = null) {
    // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
    $data = $data ?? random_bytes(16);
    assert(strlen($data) == 16);

    // Set version to 0100
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    // Set bits 6-7 to 10
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    // Output the 36 character UUID.
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}