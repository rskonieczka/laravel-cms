<?php

/**
 * Key value pair of presets with the name and dimensions to be used
 *
 * 'PRESET_NAME' => array(
 *   'width'  => INT, // in pixels
 *   'height' => INT, // in pixels
 *   'aspect_ratio' => width/height,
 * )
 *
 * eg   'presets' => array(
 *        '800x600' => array(
 *          'width' => 800,
 *          'height' => 600,
 *          'aspect_ratio' => 800/600,
 *        )
 *      ),
 *
 */
return array(


	'relatedProducts' => array(
        'width' => 180,
        'height' => 180,
		'method' => 'resize',
		'background_color' => '#ffffff',
    ),
    'teaser' => array(
        'width' => 150,
        'height' => 100,
        'aspect_ratio' => 1.5,
        'method' => 'resize',
    ),
    'medialist' => array(
        'width' => 50,
        'height' => 50,
        'aspect_ratio' => 50 / 50,
        'method' => 'crop',
    ),
    'searchlist' => array(
        'width' => 265,
        'height' => 225,
        'aspect_ratio' => 1.5,
        'method' => 'resize',
        'background_color' => '#ffffff',
    ),
    'post' => array(
        'width' => 378,
        'height' => 240,
        'aspect_ratio' => 378 / 240,
        'method' => 'crop',
    )

);
