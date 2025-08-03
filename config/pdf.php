<?php

return [
    'mode'                 => 'UTF-8',
    'format'               => 'A4',
    'default_font_size'    => '14',
    'default_font'         => 'sans-serif',
    'custom_font_path'     => storage_path("/fonts//"), // don't forget the trailing slash!
    'direction'            => 'ltr' ,
    'margin_left'          => 0,
    'margin_right'         => 0,
    'margin_top'           => 0,
    'margin_bottom'        => 0,
    'margin_header'        => 0,
    'margin_footer'        => 0,
    'orientation'          => 'P',
    'title'                => 'Laravel PDF',
    'author'               => '',
    'watermark'            => '',
    'show_watermark'       => false,
    'watermark_font'       => 'sans-serif',
    'display_mode'         => 'fullpage',
    'watermark_text_alpha' => 0.1
];
