<?php

$numbers = [
    [
        'number' => '5560160680',
        'type'   => 'Aktiebolag',
        'valid'  => true,
    ],
    [
        'number' => '5561034249',
        'type'   => 'Aktiebolag',
        'valid'  => true,
    ],
    [
        'number' => '5561034249',
        'type'   => 'Aktiebolag',
        'valid'  => true,
    ],
    [
        'number' => '5592440001',
        'type'   => 'Aktiebolag',
        'valid'  => true,
    ],
    [
        'number' => '5560160681',
        'type'   => 'Aktiebolag',
        'valid'  => false,
    ],
    [
        'number' => '5561034250',
        'type'   => 'Aktiebolag',
        'valid'  => false
    ],
    [
        'number' => '121212121212',
        'type'   => 'Enskild firma',
        'valid'  => true,
    ],
];

$list = [];

function createListObjectItem(array $number)
{
    $shortFormat = preg_match('/^16/', $number['number']) ? substr($number['number'], 2) : $number['number'];
    $longFormat = preg_replace('/(\d{4})$/', '-$1', $shortFormat, 1);

    if ($number['type'] === 'Enskild firma') {
        $longFormat = substr($longFormat, 2);
        $shortFormat = substr($shortFormat, 2);
    }

    return [
        'input'            => $number['number'],
        'long_format'      => $longFormat,
        'short_format'     => $shortFormat,
        'valid'            => $number['valid'],
        'type'             => $number['type'],
        'vat_number'       => sprintf('SE%s01', $shortFormat),
    ];
}

foreach ($numbers as $number) {
    $list[] = createListObjectItem($number);

    if ($number['type'] !== 'Enskild firma') {
        $list[] = createListObjectItem(array_merge($number, [
            'number' => sprintf('16%s',$number['number']),
        ]));
    }
}

file_put_contents(__DIR__ . "/list.json", json_encode($list, JSON_PRETTY_PRINT));
