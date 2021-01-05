<?php

return [
    'fontDir' => public_path('/report/fonts/'),
    'fontdata' => [
        'din' => [
            'R'  => 'DINNextLTArabic-Regular.ttf',    // regular font
            'B'  => 'DINNextLTArabic-Medium.ttf',       // optional: bold font
            'I'  => 'DINNextLTArabic-Light.ttf',     // optional: italic font
            'BI' => 'DINNextLTArabic-Light.ttf', // optional: bold-italic font
            'useOTL' => 0xFF,
            'useKashida' => 75,
        ],
        'din2' => [
            'R'  => 'DINNextLTArabic-Medium.ttf',    // regular font
            'B'  => 'DINNextLTArabic-Heavy.ttf',       // optional: bold font
            'I'  => 'DINNextLTArabic-Medium.ttf',     // optional: italic font
            'BI' => 'DINNextLTArabic-Medium.ttf', // optional: bold-italic font
            'useOTL' => 0xFF,
            'useKashida' => 75,
        ],
        'din3' => [
            'R'  => 'DINNextLTArabic-Bold.ttf',    // regular font
            'B'  => 'DINNextLTArabic-Bold.ttf',       // optional: bold font
            'I'  => 'DINNextLTArabic-Bold.ttf',     // optional: italic font
            'BI' => 'DINNextLTArabic-Bold.ttf', // optional: bold-italic font
            'useOTL' => 0xFF,
            'useKashida' => 75,
        ]
    ],
    'default_font' => 'din2',
    'margin_left' => 5,
	'margin_right' => 5,
	'margin_top' => 5,
	'margin_bottom' => 5,
	'margin_header' => 5,
	'margin_footer' => 5
];
