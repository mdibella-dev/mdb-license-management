<?php
/**
 * Definition of supported licenses.
 *
 * @author  Marco Di Bella
 * @package mdb-license-management
 */

namespace mdb_license_management;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;


const licenses = [
    'L001' => [
        'license_term'        => 'CC0 1.0',
        'license_description' => 'Creative Commons – kein Copyright wenn möglich („no Copyright“)',
        'license_link'        => 'https://creativecommons.org/publicdomain/zero/1.0/',
        'license_version'     => '1.0',
    ],
    'L002' => [
        'license_term'        => 'CC BY 4.0',
        'license_description' => 'Creative Commons – Namensnennung 4.0',
        'license_link'        => 'https://creativecommons.org/licenses/by/4.0/',
        'license_version'     => '4.0',
    ],
    'L003' => [
        'license_term'        => 'CC BY 3.0',
        'license_description' => 'Creative Commons – Namensnennung 3.0',
        'license_link'        => 'https://creativecommons.org/licenses/by/3.0/',
        'license_version'     => '3.0',
    ],
    'L004' => [
        'license_term'        => 'CC BY 3.0 AT',
        'license_description' => 'Creative Commons – Namensnennung 3.0 (Österreich)',
        'license_link'        => 'https://creativecommons.org/licenses/by/3.0/at/',
        'license_version'     => '3.0',
    ],
    'L005' => [
        'license_term'        => 'CC BY 3.0 CH',
        'license_description' => 'Creative Commons – Namensnennung 3.0 (Schweiz)',
        'license_link'        => 'https://creativecommons.org/licenses/by/3.0/ch/',
        'license_version'     => '3.0',
    ],
    'L006' => [
        'license_term'        => 'CC BY 3.0 DE',
        'license_description' => 'Creative Commons – Namensnennung 3.0 (Deutschland)',
        'license_link'        => 'https://creativecommons.org/licenses/by/3.0/de/',
        'license_version'     => '3.0',
    ],
    'L007' => [
        'license_term'        => 'CC BY 2.5',
        'license_description' => 'Creative Commons – Namensnennung 2.5',
        'license_link'        => 'https://creativecommons.org/licenses/by/2.5/',
        'license_version'     => '2.5',
    ],
    'L008' => [
        'license_term'        => 'CC BY 2.0',
        'license_description' => 'Creative Commons – Namensnennung 2.0',
        'license_link'        => 'https://creativecommons.org/licenses/by/2.0/',
        'license_version'     => '2.0',
    ],
    'L009' => [
        'license_term'        => 'CC BY 2.0 AT',
        'license_description' => 'Creative Commons – Namensnennung 2.0 (Österreich)',
        'license_link'        => 'https://creativecommons.org/licenses/by/2.0/at/',
        'license_version'     => '2.0',
    ],
    'L010' => [
        'license_term'        => 'CC BY 2.0 DE',
        'license_description' => 'Creative Commons – Namensnennung 2.0 (Deutschland)',
        'license_link'        => 'https://creativecommons.org/licenses/by/2.0/de/',
        'license_version'     => '2.0',
    ],
    'L011' => [
        'license_term'        => 'CC BY 1.0',
        'license_description' => 'Creative Commons – Namensnennung 1.0',
        'license_link'        => 'https://creativecommons.org/licenses/by/1.0/',
        'license_version'     => '1.0',
    ],
    'L012' => [
        'license_term'        => 'CC BY-SA 4.0',
        'license_description' => 'Creative Commons – Namensnennung, Weitergabe unter gleichen Bedingungen 4.0',
        'license_link'        => 'https://creativecommons.org/licenses/by-sa/4.0/',
        'license_version'     => '4.0',
    ],
    'L013' => [
        'license_term'        => 'CC BY-SA 3.0',
        'license_description' => 'Creative Commons – Namensnennung, Weitergabe unter gleichen Bedingungen 3.0',
        'license_link'        => 'https://creativecommons.org/licenses/by-sa/3.0/',
        'license_version'     => '3.0',
    ],
    'L014' => [
        'license_term'        => 'CC BY-SA 3.0 AT',
        'license_description' => 'Creative Commons – Namensnennung, Weitergabe unter gleichen Bedingungen 3.0 (Österreich)',
        'license_link'        => 'https://creativecommons.org/licenses/by-sa/3.0/at/',
        'license_version'     => '3.0',
    ],
    'L015' => [
        'license_term'        => 'CC BY-SA 3.0 BR',
        'license_description' => 'Creative Commons – Namensnennung, Weitergabe unter gleichen Bedingungen 3.0 (Brasilien)',
        'license_link'        => 'https://creativecommons.org/licenses/by-sa/3.0/br/',
        'license_version'     => '3.0',
    ],
    'L016' => [
        'license_term'        => 'CC BY-SA 3.0 CH',
        'license_description' => 'Creative Commons – Namensnennung, Weitergabe unter gleichen Bedingungen 3.0 (Schweiz)',
        'license_link'        => 'https://creativecommons.org/licenses/by-sa/3.0/ch/',
        'license_version'     => '3.0',
    ],
    'L017' => [
        'license_term'        => 'CC BY-SA 3.0 CN',
        'license_description' => 'Creative Commons – Namensnennung, Weitergabe unter gleichen Bedingungen 3.0 (China)',
        'license_link'        => 'https://creativecommons.org/licenses/by-sa/3.0/cn/',
        'license_version'     => '3.0',
    ],
    'L018' => [
        'license_term'        => 'CC BY-SA 3.0 DE',
        'license_description' => 'Creative Commons – Namensnennung, Weitergabe unter gleichen Bedingungen 3.0 (Deutschland)',
        'license_link'        => 'https://creativecommons.org/licenses/by-sa/3.0/de/',
        'license_version'     => '3.0',
    ],
    'L019' => [
        'license_term'        => 'CC BY-SA 3.0 ES',
        'license_description' => 'Creative Commons – Namensnennung, Weitergabe unter gleichen Bedingungen 3.0 (Spanien)',
        'license_link'        => 'https://creativecommons.org/licenses/by-sa/3.0/es/',
        'license_version'     => '3.0',
    ],
    'L020' => [
        'license_term'        => 'CC BY-SA 3.0 GR',
        'license_description' => 'Creative Commons – Namensnennung, Weitergabe unter gleichen Bedingungen 3.0 (Griechenland)',
        'license_link'        => 'https://creativecommons.org/licenses/by-sa/3.0/gr/',
        'license_version'     => '3.0',
    ],
    'L021' => [
        'license_term'        => 'CC BY-SA 3.0 HK',
        'license_description' => 'Creative Commons – Namensnennung, Weitergabe unter gleichen Bedingungen 3.0 (Hongkong)',
        'license_link'        => 'https://creativecommons.org/licenses/by-sa/3.0/hk/',
        'license_version'     => '3.0',
    ],
    'L022' => [
        'license_term'        => 'CC BY-SA 3.0 IT',
        'license_description' => 'Creative Commons – Namensnennung, Weitergabe unter gleichen Bedingungen 3.0 (Italien)',
        'license_link'        => 'https://creativecommons.org/licenses/by-sa/3.0/it/',
        'license_version'     => '3.0',
    ],
    'L023' => [
        'license_term'        => 'CC BY-SA 3.0 PT',
        'license_description' => 'Creative Commons – Namensnennung, Weitergabe unter gleichen Bedingungen 3.0 (Portugal)',
        'license_link'        => 'https://creativecommons.org/licenses/by-sa/3.0/pt/',
        'license_version'     => '3.0',
    ],
    'L024' => [
        'license_term'        => 'CC BY-SA 3.0 TW',
        'license_description' => 'Creative Commons – Namensnennung, Weitergabe unter gleichen Bedingungen 3.0 (Taiwan)',
        'license_link'        => 'https://creativecommons.org/licenses/by-sa/3.0/tw/',
        'license_version'     => '3.0',
    ],
    'L025' => [
        'license_term'        => 'CC BY-SA 2.5',
        'license_description' => 'Creative Commons – Namensnennung, Weitergabe unter gleichen Bedingungen 2.5',
        'license_link'        => 'https://creativecommons.org/licenses/by-sa/2.5/',
        'license_version'     => '2.5',
    ],
    'L026' => [
        'license_term'        => 'CC BY-SA 2.5 AU',
        'license_description' => 'Creative Commons – Namensnennung, Weitergabe unter gleichen Bedingungen 2.5 (Australien)',
        'license_link'        => 'https://creativecommons.org/licenses/by-sa/2.5/au/',
        'license_version'     => '2.5',
    ],
    'L027' => [
        'license_term'        => 'CC BY-SA 2.5 BR',
        'license_description' => 'Creative Commons – Namensnennung, Weitergabe unter gleichen Bedingungen 2.5 (Brasilien)',
        'license_link'        => 'https://creativecommons.org/licenses/by-sa/2.5/br/',
        'license_version'     => '2.5',
    ],
    'L028' => [
        'license_term'        => 'CC BY-SA 2.5 CA',
        'license_description' => 'Creative Commons – Namensnennung, Weitergabe unter gleichen Bedingungen 2.5 (Kanada)',
        'license_link'        => 'https://creativecommons.org/licenses/by-sa/2.5/ca/',
        'license_version'     => '2.5',
    ],
    'L029' => [
        'license_term'        => 'CC BY-SA 2.5 CH',
        'license_description' => 'Creative Commons – Namensnennung, Weitergabe unter gleichen Bedingungen 2.5 (Schweiz)',
        'license_link'        => 'https://creativecommons.org/licenses/by-sa/2.5/ch/',
        'license_version'     => '2.5',
    ],
    'L030' => [
        'license_term'        => 'CC BY-SA 2.5 CO',
        'license_description' => 'Creative Commons – Namensnennung, Weitergabe unter gleichen Bedingungen 2.5 (Kolumbien)',
        'license_link'        => 'https://creativecommons.org/licenses/by-sa/2.5/co/',
        'license_version'     => '2.5',
    ],
    'L031' => [
        'license_term'        => 'CC BY-SA 2.5 CN',
        'license_description' => 'Creative Commons – Namensnennung, Weitergabe unter gleichen Bedingungen 2.5 (China)',
        'license_link'        => 'https://creativecommons.org/licenses/by-sa/2.5/co/',
        'license_version'     => '2.5',
    ],
    'L032' => [
        'license_term'        => 'CC BY-SA 2.5 ES',
        'license_description' => 'Creative Commons – Namensnennung, Weitergabe unter gleichen Bedingungen 2.5 (Spanien)',
        'license_link'        => 'https://creativecommons.org/licenses/by-sa/2.5/es/',
        'license_version'     => '2.5',
    ],
    'L033' => [
        'license_term'        => 'CC BY-SA 2.5 IT',
        'license_description' => 'Creative Commons – Namensnennung, Weitergabe unter gleichen Bedingungen 2.5 (Italien)',
        'license_link'        => 'https://creativecommons.org/licenses/by-sa/2.5/it/',
        'license_version'     => '2.5',
    ],
    'L034' => [
        'license_term'        => 'CC BY-SA 2.5 MX',
        'license_description' => 'Creative Commons – Namensnennung, Weitergabe unter gleichen Bedingungen 2.5 (Mexiko)',
        'license_link'        => 'https://creativecommons.org/licenses/by-sa/2.5/mx/',
        'license_version'     => '2.5',
    ],
    'L035' => [
        'license_term'        => 'CC BY-SA 2.5 PT',
        'license_description' => 'Creative Commons – Namensnennung, Weitergabe unter gleichen Bedingungen 2.5 (Portugal)',
        'license_link'        => 'https://creativecommons.org/licenses/by-sa/2.5/pt/',
        'license_version'     => '2.5',
    ],
    'L036' => [
        'license_term'        => 'CC BY-SA 2.5 TW',
        'license_description' => 'Creative Commons – Namensnennung, Weitergabe unter gleichen Bedingungen 2.5 (Taiwan)',
        'license_link'        => 'https://creativecommons.org/licenses/by-sa/2.5/tw/',
        'license_version'     => '2.5',
    ],
    'L037' => [
        'license_term'        => 'CC BY-SA 2.0',
        'license_description' => 'Creative Commons – Namensnennung, Weitergabe unter gleichen Bedingungen 2.0',
        'license_link'        => 'https://creativecommons.org/licenses/by-sa/2.0/',
        'license_version'     => '2.0',
    ],
    'L038' => [
        'license_term'        => 'CC BY-SA 2.0 AT',
        'license_description' => 'Creative Commons – Namensnennung, Weitergabe unter gleichen Bedingungen 2.0 (Österreich)',
        'license_link'        => 'https://creativecommons.org/licenses/by-sa/2.0/at/',
        'license_version'     => '2.0',
    ],
    'L039' => [
        'license_term'        => 'CC BY-SA 2.0 AU',
        'license_description' => 'Creative Commons – Namensnennung, Weitergabe unter gleichen Bedingungen 2.0 (Australien)',
        'license_link'        => 'https://creativecommons.org/licenses/by-sa/2.0/au/',
        'license_version'     => '2.0',
    ],
    'L040' => [
        'license_term'        => 'CC BY-SA 2.0 BR',
        'license_description' => 'Creative Commons – Namensnennung, Weitergabe unter gleichen Bedingungen 2.0 (Brasilien)',
        'license_link'        => 'https://creativecommons.org/licenses/by-sa/2.0/br/',
        'license_version'     => '2.0',
    ],
    'L041' => [
        'license_term'        => 'CC BY-SA 2.0 CA',
        'license_description' => 'Creative Commons – Namensnennung, Weitergabe unter gleichen Bedingungen 2.0 (Kanada)',
        'license_link'        => 'https://creativecommons.org/licenses/by-sa/2.0/ca/',
        'license_version'     => '2.0',
    ],
    'L042' => [
        'license_term'        => 'CC BY-SA 2.0 DE',
        'license_description' => 'Creative Commons – Namensnennung, Weitergabe unter gleichen Bedingungen 2.0 (Deutschland)',
        'license_link'        => 'https://creativecommons.org/licenses/by-sa/2.0/de/',
        'license_version'     => '2.0',
    ],
    'L043' => [
        'license_term'        => 'CC BY-SA 2.0 ES',
        'license_description' => 'Creative Commons – Namensnennung, Weitergabe unter gleichen Bedingungen 2.0 (Spanien)',
        'license_link'        => 'https://creativecommons.org/licenses/by-sa/2.0/es/',
        'license_version'     => '2.0',
    ],
    'L044' => [
        'license_term'        => 'CC BY-SA 2.0 IT',
        'license_description' => 'Creative Commons – Namensnennung, Weitergabe unter gleichen Bedingungen 2.0 (Italien)',
        'license_link'        => 'https://creativecommons.org/licenses/by-sa/2.0/it/',
        'license_version'     => '2.0',
    ],
    'L045' => [
        'license_term'        => 'CC BY-SA 2.0 KR',
        'license_description' => 'Creative Commons – Namensnennung, Weitergabe unter gleichen Bedingungen 2.0 (Korea)',
        'license_link'        => 'https://creativecommons.org/licenses/by-sa/2.0/kr/',
        'license_version'     => '2.0',
    ],
    'L046' => [
        'license_term'        => 'CC BY-SA 2.0 TW',
        'license_description' => 'Creative Commons – Namensnennung, Weitergabe unter gleichen Bedingungen 2.0 (Taiwan)',
        'license_link'        => 'https://creativecommons.org/licenses/by-sa/2.0/tw/',
        'license_version'     => '2.0',
    ],
    'L047' => [
        'license_term'        => 'CC BY-SA 2.0 UK',
        'license_description' => 'Creative Commons – Namensnennung, Weitergabe unter gleichen Bedingungen 2.0 (England und Wales)',
        'license_link'        => 'https://creativecommons.org/licenses/by-sa/2.0/uk/',
        'license_version'     => '2.0',
    ],
    'L048' => [
        'license_term'        => 'CC BY-SA 1.0',
        'license_description' => 'Creative Commons – Namensnennung, Weitergabe unter gleichen Bedingungen 1.0',
        'license_link'        => 'https://creativecommons.org/licenses/by-sa/1.0/',
        'license_version'     => '1.0',
    ],
    'L049' => [
        'license_term'        => 'GNU FDL 1.3',
        'license_description' => 'GNU-Lizenz für freie Dokumentation 1.3',
        'license_link'        => 'https://www.gnu.org/licenses/fdl-1.3.html',
        'license_version'     => '1.3',
    ],
    'L050' => [
        'license_term'        => 'GNU FDL 1.2',
        'license_description' => 'GNU-Lizenz für freie Dokumentation 1.2',
        'license_link'        => 'https://www.gnu.org/licenses/fdl-1.2.html',
        'license_version'     => '1.2',
    ],
    'L051' => [
        'license_term'        => 'GNU FDL 1.1',
        'license_description' => 'GNU-Lizenz für freie Dokumentation 1.1',
        'license_link'        => 'https://www.gnu.org/licenses/old-licenses/fdl-1.1.html',
        'license_version'     => '1.1',
    ],
    'L052' => [
        'license_term'        => 'LAL 1.3',
        'license_description' => 'Lizenz Freie Kunst 1.3 (LAL/FAL)',
        'license_link'        => 'http://artlibre.org/licence/lal/de1-3/',
        'license_version'     => '1.3',
    ],
    'L053' => [
        'license_term'        => 'LAL 1.1',
        'license_description' => 'Lizenz Freie Kunst 1.1 (LAL/FAL)',
        'license_link'        => 'http://artlibre.org/licence/lal/de/',
        'license_version'     => '1.1',
    ],
    'L054' => [
        'license_term'        => 'Dreamstime RF',
        'license_description' => 'Dreamstime – Royalty-Free-Lizenz (RF)',
        'license_link'        => 'https://www.dreamstime.com/about-stock-image-licenses',
        'license_version'     => '',
    ],
    'L055' => [
        'license_term'        => 'Dreamstime RF/Editorial',
        'license_description' => 'Dreamstime – Royalty-Free-Lizenz für redaktionelle Bilder',
        'license_link'        => 'https://www.dreamstime.com/about-stock-image-licenses',
        'license_version'     => '',
    ],
    'L056' => [
        'license_term'        => 'Freeimages',
        'license_description' => 'Freeimages Inhaltslizenz',
        'license_link'        => 'https://de.freeimages.com/license',
        'license_version'     => '',
    ],
    'L057' => [
        'license_term'        => 'Gemeinfrei',
        'license_description' => 'Gemeinfrei/Public domain',
        'license_link'        => '',
        'license_version'     => '',
    ],
    'L058' => [
        'license_term'        => 'CC BY-NC-SA 2.5',
        'license_description' => 'Creative Commons – Namensnennung, Nichtkommerziell, Weitergabe unter gleichen Bedingungen 2.5',
        'license_link'        => 'https://creativecommons.org/licenses/by-nc-sa/2.5/',
        'license_version'     => '2.5',
    ],
    'L059' => [
        'license_term'        => 'CC BY-NC-SA 2.5 AU',
        'license_description' => 'Creative Commons – Namensnennung, Nichtkommerziell, Weitergabe unter gleichen Bedingungen 2.5 (Australia)',
        'license_link'        => 'https://creativecommons.org/licenses/by-nc-sa/2.5/au/',
        'license_version'     => '2.5',
    ],
    'L060' => [
        'license_term'        => 'CC BY-NC-SA 2.5 BR',
        'license_description' => 'Creative Commons – Namensnennung, Nichtkommerziell, Weitergabe unter gleichen Bedingungen 2.5 (Brasilien)',
        'license_link'        => 'https://creativecommons.org/licenses/by-nc-sa/2.5/br/',
        'license_version'     => '2.5',
    ],
    'L061' => [
        'license_term'        => 'CC BY-NC-SA 2.5 CA',
        'license_description' => 'Creative Commons – Namensnennung, Nichtkommerziell, Weitergabe unter gleichen Bedingungen 2.5 (Kanada)',
        'license_link'        => 'https://creativecommons.org/licenses/by-nc-sa/2.5/ca/',
        'license_version'     => '2.5',
    ],
    'L062' => [
        'license_term'        => 'CC BY-NC-SA 2.5 CH',
        'license_description' => 'Creative Commons – Namensnennung, Nichtkommerziell, Weitergabe unter gleichen Bedingungen 2.5 (Schweiz)',
        'license_link'        => 'https://creativecommons.org/licenses/by-nc-sa/2.5/ch/',
        'license_version'     => '2.5',
    ],
    'L063' => [
        'license_term'        => 'CC BY-NC-SA 2.5 CN',
        'license_description' => 'Creative Commons – Namensnennung, Nichtkommerziell, Weitergabe unter gleichen Bedingungen 2.5 (China)',
        'license_link'        => 'https://creativecommons.org/licenses/by-nc-sa/2.5/cn/',
        'license_version'     => '2.5',
    ],
    'L064' => [
        'license_term'        => 'CC BY-NC-SA 2.5 CO',
        'license_description' => 'Creative Commons – Namensnennung, Nichtkommerziell, Weitergabe unter gleichen Bedingungen 2.5 (Kolumbien)',
        'license_link'        => 'https://creativecommons.org/licenses/by-nc-sa/2.5/co/',
        'license_version'     => '2.5',
    ],
    'L065' => [
        'license_term'        => 'CC BY-NC-SA 2.5 ES',
        'license_description' => 'Creative Commons – Namensnennung, Nichtkommerziell, Weitergabe unter gleichen Bedingungen 2.5 (Spanien)',
        'license_link'        => 'https://creativecommons.org/licenses/by-nc-sa/2.5/es/',
        'license_version'     => '2.5',
    ],
    'L066' => [
        'license_term'        => 'CC BY-NC-SA 2.5 IT',
        'license_description' => 'Creative Commons – Namensnennung, Nichtkommerziell, Weitergabe unter gleichen Bedingungen 2.5 (Italien)',
        'license_link'        => 'https://creativecommons.org/licenses/by-nc-sa/2.5/it/',
        'license_version'     => '2.5',
    ],
    'L067' => [
        'license_term'        => 'CC BY-NC-SA 2.5 MX',
        'license_description' => 'Creative Commons – Namensnennung, Nichtkommerziell, Weitergabe unter gleichen Bedingungen 2.5 (Mexiko)',
        'license_link'        => 'https://creativecommons.org/licenses/by-nc-sa/2.5/mx/',
        'license_version'     => '2.5',
    ],
    'L068' => [
        'license_term'        => 'CC BY-NC-SA 2.5 PT',
        'license_description' => 'Creative Commons – Namensnennung, Nichtkommerziell, Weitergabe unter gleichen Bedingungen 2.5 (Portugal)',
        'license_link'        => 'https://creativecommons.org/licenses/by-nc-sa/2.5/pt/',
        'license_version'     => '2.5',
    ],
    'L069' => [
        'license_term'        => 'CC BY-NC-SA 2.5 SE',
        'license_description' => 'Creative Commons – Namensnennung, Nichtkommerziell, Weitergabe unter gleichen Bedingungen 2.5 (Schweden)',
        'license_link'        => 'https://creativecommons.org/licenses/by-nc-sa/2.5/se/',
        'license_version'     => '2.5',
    ],
    'L070' => [
        'license_term'        => 'CC BY-NC-SA 2.5 TW',
        'license_description' => 'Creative Commons – Namensnennung, Nichtkommerziell, Weitergabe unter gleichen Bedingungen 2.5 (Taiwan)',
        'license_link'        => 'https://creativecommons.org/licenses/by-nc-sa/2.5/tw/',
        'license_version'     => '2.5',
    ],
];
