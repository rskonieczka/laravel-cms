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

    '100x100' => array(
        'width' => 100,
        'height' => 100,
        'aspect_ratio' => 1,
    ),

    'teaser' => array(
        'width' => 150,
        'height' => 100,
        'aspect_ratio' => 1.5,
    ),
    '465x320' => array(
        'width' => 465,
        'height' => 320,
        'aspect_ratio' => 465 / 320,
    ),
    'post' => array(
        'width' => 750,
        'height' => 468,
        'aspect_ratio' => 750 / 468,
    ),
    'panel' => array(
        'width' => 293,
        'height' => 197,
        'aspect_ratio' => 293 / 197,
    ),
    'medialist' => array(
        'width' => 50,
        'height' => 50,
        'aspect_ratio' => 50 / 50,
    ),
    '780x400' => array(
        'width' => 780,
        'height' => 400,
        'aspect_ratio' => 780 / 400,
    ),
    '780x280' => array(
        'width' => 780,
        'height' => 280,
        'aspect_ratio' => 780 / 280,
    ),
    '390x400' => array(
        'width' => 390,
        'height' => 400,
        'aspect_ratio' => 390 / 400,
    ),
    '390x280' => array(
        'width' => 390,
        'height' => 280,
        'aspect_ratio' => 390 / 280,
    ),
    '390x200' => array(
        'width' => 390,
        'height' => 200,
        'aspect_ratio' => 390 / 200
    ),
	'390x560' => array(
		'width' => 390,
		'height' => 560,
		'aspect_ratio' => 390 / 560,
	),
	'601x414' => array(
		'width' => 601,
		'height' => 414,
		'aspect_ratio' => 601 / 414,
	),



);
