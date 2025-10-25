<?php
/**
 * All supported media licenses.
 *
 * Returns an array with a preset of media license meta data
 * to setup the media_license taxonomy.
*/


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;


return [
    'version'  => '1.4',
    'licenses' => [
        'l001' => [
            'license_name'        => 'CC0 1.0',
            'license_description' => 'Creative Commons – no Copyright',
            'license_terms_url'   => 'https://creativecommons.org/publicdomain/zero/1.0/',
            'extra_image'         => 'cc-zero.svg'
        ],
        'l002' => [
            'license_name'        => 'CC BY 4.0',
            'license_description' => 'Creative Commons – Attribution 4.0',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by/4.0/',
            'extra_image'         => 'cc-by.svg'
        ],
        'l003' => [
            'license_name'        => 'CC BY 3.0',
            'license_description' => 'Creative Commons – Attribution 3.0',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by/3.0/',
            'extra_image'         => 'cc-by.svg'
        ],
        'l004' => [
            'license_name'        => 'CC BY 3.0 AT',
            'license_description' => 'Creative Commons – Attribution 3.0 (Austria)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by/3.0/at/',
            'extra_image'         => 'cc-by.svg'
        ],
        'l005' => [
            'license_name'        => 'CC BY 3.0 CH',
            'license_description' => 'Creative Commons – Attribution 3.0 (Swiss)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by/3.0/ch/',
            'extra_image'         => 'cc-by.svg'
        ],
        'l006' => [
            'license_name'        => 'CC BY 3.0 DE',
            'license_description' => 'Creative Commons – Attribution 3.0 (Germany)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by/3.0/de/',
            'extra_image'         => 'cc-by.svg'
        ],
        'l007' => [
            'license_name'        => 'CC BY 2.5',
            'license_description' => 'Creative Commons – Attribution 2.5',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by/2.5/',
            'extra_image'         => 'cc-by.svg'
        ],
        'l008' => [
            'license_name'        => 'CC BY 2.0',
            'license_description' => 'Creative Commons – Attribution 2.0',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by/2.0/',
            'extra_image'         => 'cc-by.svg'
        ],
        'l009' => [
            'license_name'        => 'CC BY 2.0 AT',
            'license_description' => 'Creative Commons – Attribution 2.0 (Austria)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by/2.0/at/',
            'extra_image'         => 'cc-by.svg'
        ],
        'l010' => [
            'license_name'        => 'CC BY 2.0 DE',
            'license_description' => 'Creative Commons – Attribution 2.0 (Germany)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by/2.0/de/',
            'extra_image'         => 'cc-by.svg'
        ],
        'l011' => [
            'license_name'        => 'CC BY 1.0',
            'license_description' => 'Creative Commons – Attribution 1.0',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by/1.0/',
            'extra_image'         => 'cc-by.svg'
        ],
        'l012' => [
            'license_name'        => 'CC BY-SA 4.0',
            'license_description' => 'Creative Commons – Attribution-ShareAlike 4.0',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-sa/4.0/',
            'extra_image'         => 'cc-by-sa.svg'
        ],
        'l013' => [
            'license_name'        => 'CC BY-SA 3.0',
            'license_description' => 'Creative Commons – Attribution-ShareAlike 3.0',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-sa/3.0/',
            'extra_image'         => 'cc-by-sa.svg'
        ],
        'l014' => [
            'license_name'        => 'CC BY-SA 3.0 AT',
            'license_description' => 'Creative Commons – Attribution-ShareAlike 3.0 (Austria)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-sa/3.0/at/',
            'extra_image'         => 'cc-by-sa.svg'
        ],
        'l015' => [
            'license_name'        => 'CC BY-SA 3.0 BR',
            'license_description' => 'Creative Commons – Attribution-ShareAlike 3.0 (Brasil)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-sa/3.0/br/',
            'extra_image'         => 'cc-by-sa.svg'
        ],
        'l016' => [
            'license_name'        => 'CC BY-SA 3.0 CH',
            'license_description' => 'Creative Commons – Attribution-ShareAlike 3.0 (Swiss)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-sa/3.0/ch/',
            'extra_image'         => 'cc-by-sa.svg'
        ],
        'l017' => [
            'license_name'        => 'CC BY-SA 3.0 CN',
            'license_description' => 'Creative Commons – Attribution-ShareAlike 3.0 (China)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-sa/3.0/cn/',
            'extra_image'         => 'cc-by-sa.svg'
        ],
        'l018' => [
            'license_name'        => 'CC BY-SA 3.0 DE',
            'license_description' => 'Creative Commons – Attribution-ShareAlike 3.0 (Germany)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-sa/3.0/de/',
            'extra_image'         => 'cc-by-sa.svg'
        ],
        'l019' => [
            'license_name'        => 'CC BY-SA 3.0 ES',
            'license_description' => 'Creative Commons – Attribution-ShareAlike 3.0 (Spain)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-sa/3.0/es/',
            'extra_image'         => 'cc-by-sa.svg'
        ],
        'l020' => [
            'license_name'        => 'CC BY-SA 3.0 GR',
            'license_description' => 'Creative Commons – Attribution-ShareAlike 3.0 (Greece)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-sa/3.0/gr/',
            'extra_image'         => 'cc-by-sa.svg'
        ],
        'l021' => [
            'license_name'        => 'CC BY-SA 3.0 HK',
            'license_description' => 'Creative Commons – Attribution-ShareAlike 3.0 (Hongkong)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-sa/3.0/hk/',
            'extra_image'         => 'cc-by-sa.svg'
        ],
        'l022' => [
            'license_name'        => 'CC BY-SA 3.0 IT',
            'license_description' => 'Creative Commons – Attribution-ShareAlike 3.0 (Italy)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-sa/3.0/it/',
            'extra_image'         => 'cc-by-sa.svg'
        ],
        'l023' => [
            'license_name'        => 'CC BY-SA 3.0 PT',
            'license_description' => 'Creative Commons – Attribution-ShareAlike 3.0 (Portugal)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-sa/3.0/pt/',
            'extra_image'         => 'cc-by-sa.svg'
        ],
        'l024' => [
            'license_name'        => 'CC BY-SA 3.0 TW',
            'license_description' => 'Creative Commons – Attribution-ShareAlike 3.0 (Taiwan)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-sa/3.0/tw/',
            'extra_image'         => 'cc-by-sa.svg'
        ],
        'l025' => [
            'license_name'        => 'CC BY-SA 2.5',
            'license_description' => 'Creative Commons – Attribution-ShareAlike 2.5',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-sa/2.5/',
            'extra_image'         => 'cc-by-sa.svg'
        ],
        'l026' => [
            'license_name'        => 'CC BY-SA 2.5 AU',
            'license_description' => 'Creative Commons – Attribution-ShareAlike 2.5 (Australia)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-sa/2.5/au/',
            'extra_image'         => 'cc-by-sa.svg'
        ],
        'l027' => [
            'license_name'        => 'CC BY-SA 2.5 BR',
            'license_description' => 'Creative Commons – Attribution-ShareAlike 2.5 (Brasil)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-sa/2.5/br/',
            'extra_image'         => 'cc-by-sa.svg'
        ],
        'l028' => [
            'license_name'        => 'CC BY-SA 2.5 CA',
            'license_description' => 'Creative Commons – Attribution-ShareAlike 2.5 (Canada)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-sa/2.5/ca/',
            'extra_image'         => 'cc-by-sa.svg'
        ],
        'l029' => [
            'license_name'        => 'CC BY-SA 2.5 CH',
            'license_description' => 'Creative Commons – Attribution-ShareAlike 2.5 (Swiss)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-sa/2.5/ch/',
            'extra_image'         => 'cc-by-sa.svg'
        ],
        'l030' => [
            'license_name'        => 'CC BY-SA 2.5 CO',
            'license_description' => 'Creative Commons – Attribution-ShareAlike 2.5 (Columbia)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-sa/2.5/co/',
            'extra_image'         => 'cc-by-sa.svg'
        ],
        'l031' => [
            'license_name'        => 'CC BY-SA 2.5 CN',
            'license_description' => 'Creative Commons – Attribution-ShareAlike 2.5 (China)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-sa/2.5/co/',
            'extra_image'         => 'cc-by-sa.svg'
        ],
        'l032' => [
            'license_name'        => 'CC BY-SA 2.5 ES',
            'license_description' => 'Creative Commons – Attribution-ShareAlike 2.5 (Spain)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-sa/2.5/es/',
            'extra_image'         => 'cc-by-sa.svg'
        ],
        'l033' => [
            'license_name'        => 'CC BY-SA 2.5 IT',
            'license_description' => 'Creative Commons – Attribution-ShareAlike 2.5 (Italy)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-sa/2.5/it/',
            'extra_image'         => 'cc-by-sa.svg'
        ],
        'l034' => [
            'license_name'        => 'CC BY-SA 2.5 MX',
            'license_description' => 'Creative Commons – Attribution-ShareAlike 2.5 (Mexico)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-sa/2.5/mx/',
            'extra_image'         => 'cc-by-sa.svg'
        ],
        'l035' => [
            'license_name'        => 'CC BY-SA 2.5 PT',
            'license_description' => 'Creative Commons – Attribution-ShareAlike 2.5 (Portugal)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-sa/2.5/pt/',
            'extra_image'         => 'cc-by-sa.svg'
        ],
        'l036' => [
            'license_name'        => 'CC BY-SA 2.5 TW',
            'license_description' => 'Creative Commons – Attribution-ShareAlike 2.5 (Taiwan)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-sa/2.5/tw/',
            'extra_image'         => 'cc-by-sa.svg'
        ],
        'l037' => [
            'license_name'        => 'CC BY-SA 2.0',
            'license_description' => 'Creative Commons – Attribution-ShareAlike 2.0',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-sa/2.0/',
            'extra_image'         => 'cc-by-sa.svg'
        ],
        'l038' => [
            'license_name'        => 'CC BY-SA 2.0 AT',
            'license_description' => 'Creative Commons – Attribution-ShareAlike 2.0 (Austria)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-sa/2.0/at/',
            'extra_image'         => 'cc-by-sa.svg'
        ],
        'l039' => [
            'license_name'        => 'CC BY-SA 2.0 AU',
            'license_description' => 'Creative Commons – Attribution-ShareAlike 2.0 (Australia)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-sa/2.0/au/',
            'extra_image'         => 'cc-by-sa.svg'
        ],
        'l040' => [
            'license_name'        => 'CC BY-SA 2.0 BR',
            'license_description' => 'Creative Commons – Attribution-ShareAlike 2.0 (Brasil)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-sa/2.0/br/',
            'extra_image'         => 'cc-by-sa.svg'
        ],
        'l041' => [
            'license_name'        => 'CC BY-SA 2.0 CA',
            'license_description' => 'Creative Commons – Attribution-ShareAlike 2.0 (Canada)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-sa/2.0/ca/',
            'extra_image'         => 'cc-by-sa.svg'
        ],
        'l042' => [
            'license_name'        => 'CC BY-SA 2.0 DE',
            'license_description' => 'Creative Commons – Attribution-ShareAlike 2.0 (Germany)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-sa/2.0/de/',
            'extra_image'         => 'cc-by-sa.svg'
        ],
        'l043' => [
            'license_name'        => 'CC BY-SA 2.0 ES',
            'license_description' => 'Creative Commons – Attribution-ShareAlike 2.0 (Spain)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-sa/2.0/es/',
            'extra_image'         => 'cc-by-sa.svg'
        ],
        'l044' => [
            'license_name'        => 'CC BY-SA 2.0 IT',
            'license_description' => 'Creative Commons – Attribution-ShareAlike 2.0 (Italy)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-sa/2.0/it/',
            'extra_image'         => 'cc-by-sa.svg'
        ],
        'l045' => [
            'license_name'        => 'CC BY-SA 2.0 KR',
            'license_description' => 'Creative Commons – Attribution-ShareAlike 2.0 (Korea)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-sa/2.0/kr/',
            'extra_image'         => 'cc-by-sa.svg'
        ],
        'l046' => [
            'license_name'        => 'CC BY-SA 2.0 TW',
            'license_description' => 'Creative Commons – Attribution-ShareAlike 2.0 (Taiwan)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-sa/2.0/tw/',
            'extra_image'         => 'cc-by-sa.svg'
        ],
        'l047' => [
            'license_name'        => 'CC BY-SA 2.0 UK',
            'license_description' => 'Creative Commons – Attribution-ShareAlike 2.0 (England and Wales)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-sa/2.0/uk/',
            'extra_image'         => 'cc-by-sa.svg'
        ],
        'l048' => [
            'license_name'        => 'CC BY-SA 1.0',
            'license_description' => 'Creative Commons – Attribution-ShareAlike 1.0',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-sa/1.0/',
            'extra_image'         => 'cc-by-sa.svg'
        ],
        'l049' => [
            'license_name'        => 'GNU FDL 1.3',
            'license_description' => 'GNU Free Documentation License 1.3',
            'license_terms_url'   => 'https://www.gnu.org/licenses/fdl-1.3.html',
            'extra_image'         => 'gfdl.svg'
        ],
        'l050' => [
            'license_name'        => 'GNU FDL 1.2',
            'license_description' => 'GNU Free Documentation License 1.2',
            'license_terms_url'   => 'https://www.gnu.org/licenses/fdl-1.2.html',
            'extra_image'         => 'gfdl.svg'
        ],
        'l051' => [
            'license_name'        => 'GNU FDL 1.1',
            'license_description' => 'GNU Free Documentation License 1.1',
            'license_terms_url'   => 'https://www.gnu.org/licenses/old-licenses/fdl-1.1.html',
            'extra_image'         => 'gfdl.svg'
        ],
        'l052' => [
            'license_name'        => 'LAL 1.3',
            'license_description' => 'Licence Art Libre 1.3 (LAL/FAL)',
            'license_terms_url'   => 'http=>//artlibre.org/licence/lal/de1-3/',
            'extra_image'         => 'lal.svg'
        ],
        'l053' => [
            'license_name'        => 'LAL 1.1',
            'license_description' => 'Licence Art Libre 1.1 (LAL/FAL)',
            'license_terms_url'   => 'http=>//artlibre.org/licence/lal/de/',
            'extra_image'         => 'lal.svg'
        ],
        'l054' => [
            'license_name'        => 'Dreamstime RF',
            'license_description' => 'Dreamstime – Royalty Free (RF)',
            'license_terms_url'   => 'https://www.dreamstime.com/about-stock-image_file_name-licenses',
            'extra_image'         => 'dreamstime.svg'
        ],
        'l055' => [
            'license_name'        => 'Dreamstime RF/Editorial',
            'license_description' => 'Dreamstime – Royalty Free - editorial use only',
            'license_terms_url'   => 'https://www.dreamstime.com/about-stock-image_file_name-licenses',
            'extra_image'         => 'dreamstime.svg'
        ],
        'l056' => [
            'license_name'        => 'Freeimage_file_names',
            'license_description' => 'Freeimage_file_names license',
            'license_terms_url'   => 'https://de.freeimage_file_names.com/license',
            'extra_image'         => 'freeimages.svg'
        ],
        'l057' => [
            'license_name'        => 'Public domain',
            'license_description' => 'Public domain',
            'license_terms_url'   => 'https://creativecommons.org/publicdomain/',
            'extra_image'         => 'publicdomain.svg'
        ],
        'l058' => [
            'license_name'        => 'CC BY-NC-SA 2.5',
            'license_description' => 'Creative Commons – Attribution-NonCommercial-ShareAlike 2.5',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-nc-sa/2.5/',
            'extra_image'         => 'cc-by-nc-sa.svg'
        ],
        'l059' => [
            'license_name'        => 'CC BY-NC-SA 2.5 AU',
            'license_description' => 'Creative Commons – Attribution-NonCommercial-ShareAlike 2.5 (Australia)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-nc-sa/2.5/au/',
            'extra_image'         => 'cc-by-nc-sa.svg'
        ],
        'l060' => [
            'license_name'        => 'CC BY-NC-SA 2.5 BR',
            'license_description' => 'Creative Commons – Attribution-NonCommercial-ShareAlike 2.5 (Brasil)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-nc-sa/2.5/br/',
            'extra_image'         => 'cc-by-nc-sa.svg'
        ],
        'l061' => [
            'license_name'        => 'CC BY-NC-SA 2.5 CA',
            'license_description' => 'Creative Commons – Attribution-NonCommercial-ShareAlike 2.5 (Canada)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-nc-sa/2.5/ca/',
            'extra_image'         => 'cc-by-nc-sa.svg'
        ],
        'l062' => [
            'license_name'        => 'CC BY-NC-SA 2.5 CH',
            'license_description' => 'Creative Commons – Attribution-NonCommercial-ShareAlike 2.5 (Swiss)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-nc-sa/2.5/ch/',
            'extra_image'         => 'cc-by-nc-sa.svg'
        ],
        'l063' => [
            'license_name'        => 'CC BY-NC-SA 2.5 CN',
            'license_description' => 'Creative Commons – Attribution-NonCommercial-ShareAlike 2.5 (China)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-nc-sa/2.5/cn/',
            'extra_image'         => 'cc-by-nc-sa.svg'
        ],
        'l064' => [
            'license_name'        => 'CC BY-NC-SA 2.5 CO',
            'license_description' => 'Creative Commons – Attribution-NonCommercial-ShareAlike 2.5 (Columbia)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-nc-sa/2.5/co/',
            'extra_image'         => 'cc-by-nc-sa.svg'
        ],
        'l065' => [
            'license_name'        => 'CC BY-NC-SA 2.5 ES',
            'license_description' => 'Creative Commons – Attribution-NonCommercial-ShareAlike 2.5 (Spain)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-nc-sa/2.5/es/',
            'extra_image'         => 'cc-by-nc-sa.svg'
        ],
        'l066' => [
            'license_name'        => 'CC BY-NC-SA 2.5 IT',
            'license_description' => 'Creative Commons – Attribution-NonCommercial-ShareAlike 2.5 (Italy)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-nc-sa/2.5/it/',
            'extra_image'         => 'cc-by-nc-sa.svg'
        ],
        'l067' => [
            'license_name'        => 'CC BY-NC-SA 2.5 MX',
            'license_description' => 'Creative Commons – Attribution-NonCommercial-ShareAlike 2.5 (Mexico)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-nc-sa/2.5/mx/',
            'extra_image'         => 'cc-by-nc-sa.svg'
        ],
        'l068' => [
            'license_name'        => 'CC BY-NC-SA 2.5 PT',
            'license_description' => 'Creative Commons – Attribution-NonCommercial-ShareAlike 2.5 (Portugal)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-nc-sa/2.5/pt/',
            'extra_image'         => 'cc-by-nc-sa.svg'
        ],
        'l069' => [
            'license_name'        => 'CC BY-NC-SA 2.5 SE',
            'license_description' => 'Creative Commons – Attribution-NonCommercial-ShareAlike 2.5 (Sweden)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-nc-sa/2.5/se/',
            'extra_image'         => 'cc-by-nc-sa.svg'
        ],
        'l070' => [
            'license_name'        => 'CC BY-NC-SA 2.5 TW',
            'license_description' => 'Creative Commons – Attribution-NonCommercial-ShareAlike 2.5 (Taiwan)',
            'license_terms_url'   => 'https://creativecommons.org/licenses/by-nc-sa/2.5/tw/',
            'extra_image'         => 'cc-by-nc-sa.svg'
        ],
        'l071' => [
            'license_name'        => 'Pixabay',
            'license_description' => 'Pixabay license',
            'license_terms_url'   => 'https://pixabay.com/service/license-summary/',
            'extra_image'         => 'pixabay.svg'
        ],
        'l072' => [
            'license_name'        => 'Pexels',
            'license_description' => 'Pexels license',
            'license_terms_url'   => 'https://www.pexels.com/de-de/lizenz/',
            'extra_image'         => 'pexels.svg'
        ],
        'l073' => [
            'license_name'        => 'Unsplash',
            'license_description' => 'Unsplash license',
            'license_terms_url'   => 'https://unsplash.com/de/lizenz',
            'extra_image'         => 'unsplash.svg'
        }
    }
];
