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
];

$list = [];

function randomNum(bool $male): int
{
    // 9880 - 9999 is defined as valid test series
    $num = rand(988, 999);

    if ($num % 2 !== intval($male)) {
        $num = min($num + 1, 998 + intval($male));
    }

    return $num;
}

function randomDate(int $year = 0, $con = false): string
{
    $randomTimestamp = mt_rand((new DateTime)->modify('-90 years')->getTimestamp(), (new DateTime())->getTimestamp());
    $randomDate      = new DateTime();
    $randomDate->setTimestamp($randomTimestamp);

    if ($year < 0) {
        $randomDate->modify(sprintf('%d years', $year));
    } elseif ($year > 0) {
        $randomDate->setDate($year, $randomDate->format('m'), $randomDate->format('d'));
    }

    if ($con) {
        return $randomDate->format('Ym') . strval(intval($randomDate->format('d')) + 60);
    }

    return $randomDate->format('Ymd');
}

function randomSSN(int $year = 0, bool $con = false, bool $male = true): string
{
    return randomDate($year, $con) . randomNum($male);
}

function luhn(string $str): int
{
    $sum = 0;

    for ($i = 0; $i < strlen($str); $i++) {
        $v = intval($str[$i]);
        $v *= 2 - ($i % 2);

        if ($v > 9) {
            $v -= 9;
        }

        $sum += $v;
    }

    return intval(ceil($sum / 10) * 10 - $sum);
}

function createListObjectItem(array $number)
{
    $shortFormat = preg_match('/^16/', $number['number']) ? substr($number['number'], 2) : $number['number'];
    $longFormat = preg_replace('/(\d{4})$/', ($number['sep'] ?? '-') . '$1', $shortFormat, 1);

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

$numbers[] = [
    'number' => '191212121212',
    'type'   => 'Enskild firma',
    'valid'  => true,
    'sep'    => '+'
];

for ($i = 0; $i < 11; $i++) {
    $number = randomSSN(0, $i > 1, true, boolval($i % 2));

    $luhn = luhn(substr($number, 2));

    $numbers[] = [
        'number' => $number . $luhn,
        'type'   => 'Enskild firma',
        'valid'  => true,
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
