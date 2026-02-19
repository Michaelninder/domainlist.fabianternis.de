<?php

return [
    'version'    => '1.4.1',
    'site_title' => 'Domain List',
    'owner'      => 'Fabian Ternis',

    /*
    |--------------------------------------------------------------------------
    | Domain entries
    |--------------------------------------------------------------------------
    | Each entry supports:
    |   'from'         => 'YYYY-MM-DD' | null
    |   'to'           => 'YYYY-MM-DD' | null   (null = Present)
    |   'status'       => 'active' | 'expired'
    |   'description'  => string | null
    |   'note'         => string | null
    |   'github_url'   => string | null
    |   'owner'        => string | null          if different from site owner
    |   'github_owner' => string | null          GitHub profile URL of the owner
    |   'subdomains'   => array | null           keyed by subdomain prefix, e.g.:
    |       [
    |           // key = subdomain prefix  →  https://{key}.{domain}
    |           // use '@' for the apex/root itself
    |           '@' => [
    |               'name'        => string | null,
    |               'description' => string | null,
    |               'github'      => string | null,
    |               'is_deployed' => bool,        // optional, default true
    |           ],
    |           'status' => [
    |               'name'        => 'Status Page',
    |               'description' => 'System status dashboard.',
    |               'github'      => 'https://github.com/org/repo',
    |               'is_deployed' => true,
    |           ],
    |       ]
    */

    'domains' => [

        'xp-craft.de' => [
            'from' => '2024-06-28', 'to' => '2025-07-01', 'status' => 'expired',
            'description' => 'XP-Craft.de Minecraft Servernetwork', 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'darkangel-mc.de' => [
            'from' => '2024-08-05', 'to' => '2025-08-05', 'status' => 'expired',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'xp-host.de' => [
            'from' => '2024-10-09', 'to' => '2025-10-09', 'status' => 'expired',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'ebay-konto.de' => [
            'from' => '2024-10-09', 'to' => '2025-10-09', 'status' => 'expired',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'citycraft-nw.de' => [
            'from' => '2024-10-23', 'to' => '2025-10-23', 'status' => 'expired',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'mail-free.de' => [
            'from' => '2024-11-29', 'to' => '2025-11-29', 'status' => 'expired',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'michaelninder.de' => [
            'from' => null, 'to' => null, 'status' => 'expired',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'xp-link.de' => [
            'from' => null, 'to' => null, 'status' => 'expired',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'dogwaterdev.de' => [
            'from'         => null,
            'to'           => null,
            'status'       => 'active',
            'description'  => 'Personal domain for DogWaterDev. Re-registered after initial expiry.',
            'note'         => 're-registered',
            'github_url'   => 'https://github.com/DogWaterDev',
            'owner'        => 'DogWaterDev',
            'github_owner' => 'https://github.com/DogWaterDev',
            'subdomains'   => null,
        ],
        'xp-node.de' => [
            'from' => null, 'to' => null, 'status' => 'expired',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'dexify.eu' => [
            'from' => null, 'to' => null, 'status' => 'expired',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'xp-cloud.eu' => [
            'from' => null, 'to' => null, 'status' => 'expired',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'code-trainer.de' => [
            'from' => null, 'to' => null, 'status' => 'expired',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'a-sub.de' => [
            'from' => null, 'to' => null, 'status' => 'expired',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'b-sub.de' => [
            'from' => null, 'to' => null, 'status' => 'expired',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'hhgkl.de' => [
            'from' => null, 'to' => null, 'status' => 'expired',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'citycraft-smp.de' => [
            'from' => null, 'to' => null, 'status' => 'expired',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'quizhive.de' => [
            'from' => null, 'to' => null, 'status' => 'expired',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'bank-of-europe.eu' => [
            'from' => null, 'to' => null, 'status' => 'expired',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'craftattack.xyz' => [
            'from' => null, 'to' => null, 'status' => 'expired',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'euromc.eu' => [
            'from' => null, 'to' => null, 'status' => 'expired',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'xp-h.de' => [
            'from' => null, 'to' => null, 'status' => 'expired',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'louixch.de' => [
            'from'         => null,
            'to'           => null,
            'status'       => 'active',
            'description'  => 'Personal domain for Louixch.',
            'note'         => 'for Louixch',
            'github_url'   => null,
            'owner'        => 'Louixch',
            'github_owner' => null,
            'subdomains'   => null,
        ],
        'europehost.eu' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'xp-l.de' => [
            'from' => null, 'to' => null, 'status' => 'expired',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'sub2.eu' => [
            'from' => null, 'to' => null, 'status' => 'expired',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'domaingen.de' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'webstruct.eu' => [
            'from' => null, 'to' => null, 'status' => 'expired',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'mcservertools.eu' => [
            'from' => null, 'to' => null, 'status' => 'expired',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'xphost.eu' => [
            'from' => null, 'to' => null, 'status' => 'expired',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'mcpractice.eu' => [
            'from' => null, 'to' => null, 'status' => 'expired',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'novastack.eu' => [
            'from' => null, 'to' => null, 'status' => 'expired',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'flexistack.eu' => [
            'from' => null, 'to' => null, 'status' => 'expired',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'pelicanhost.eu' => [
            'from' => null, 'to' => null, 'status' => 'expired',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'axiohost.eu' => [
            'from' => null, 'to' => null, 'status' => 'expired',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'axiohost.de' => [
            'from' => null, 'to' => null, 'status' => 'expired',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'city-craft.de' => [
            'from' => null, 'to' => null, 'status' => 'expired',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'xp-domains.de' => [
            'from' => null, 'to' => null, 'status' => 'expired',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'xp-domain.de' => [
            'from' => null, 'to' => null, 'status' => 'expired',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'xpsystems.eu' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'xpsys.de' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'xfolio.eu' => [
            'from' => null, 'to' => null, 'status' => 'expired',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'eupractice.eu' => [
            'from' => null, 'to' => null, 'status' => 'expired',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'soulnode.eu' => [
            'from' => null, 'to' => null, 'status' => 'expired',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'eudomains.eu' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => 'Domain management services.',
            'note'         => null,
            'github_url'   => 'https://github.com/eudomains',
            'owner'        => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'bank-of-germany.de' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'schulchat-rlp.de' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'nerax.eu' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'anlink.eu' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'mchost24.eu' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        '24mc.eu' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'schulkampus-rlp.de' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'bildungslogin-rlp.de' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'xp-mail.eu' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'pythonhub.eu' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'xmage.eu' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'imagu.eu' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'dcpic.eu' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => 'Discord picture service.',
            'note'         => null,
            'github_url'   => 'https://github.com/europehost/dsc.pics',
            'owner'        => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'swiftshare.eu' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'pyshop.de' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'eushare.eu' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'ptero01.eu' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'epyc01.eu' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'ryzen01.eu' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'xpgames.eu' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'csslib.eu' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        '2note.eu' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'burgermc.de' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'fternis.de' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => 'Short personal domain.',
            'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'bildungsbereich-rlp.de' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'xp-ad.de' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'laravel-tutorial.eu' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'gehirn-weg.de' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'staatliches-heinrich-heine-gymnasium-kaiserslautern.de' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'spielefrei.de' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'yourlink.app' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'mcserver.lol' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'dsc.pics' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => 'Discord image sharing service.',
            'note'         => null,
            'github_url'   => 'https://github.com/europehost/dsc.pics',
            'owner'        => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'mtex.dev' => [
            'from'         => null,
            'to'           => null,
            'status'       => 'active',
            'description'  => 'Developer tools and services hub by MTEX-dev.',
            'note'         => null,
            'github_url'   => 'https://github.com/MTEX-dev',
            'owner'        => 'MTEX-dev',
            'github_owner' => 'https://github.com/MTEX-dev',
            'subdomains'   => [
                // key '@' = the apex domain itself (https://mtex.dev)
                '@' => [
                    'name'        => 'Landingpage',
                    'description' => 'Our main landingpage.',
                    'github'      => 'https://github.com/MTEDdotDev/static-landingpage',
                    'is_deployed' => true,
                ],
                'index' => [
                    'name'        => 'Service Index',
                    'description' => 'Central directory and manifest of all mtex.dev domains and nodes.',
                    'github'      => 'https://github.com/MTEDdotDev/index.mtex.dev',
                    'is_deployed' => true,
                ],
                'legal' => [
                    'name'        => 'Legal Center',
                    'description' => 'Multilingual hub for imprint, privacy policies, and legal documentation.',
                    'github'      => 'https://github.com/MTEXdotDev/legal.mtex.dev',
                    'is_deployed' => true,
                ],
                'tw' => [
                    'name'        => 'Tailwind Components Library',
                    'description' => 'Our TailwindCSS component library for rapid UI development.',
                    'github'      => 'https://github.com/MTEDdotDev/tw.mtex.dev',
                    'is_deployed' => true,
                ],
                'nx' => [
                    'name'        => 'MTEX Nexus',
                    'description' => 'A lightweight JSON API gateway for seamless data exchange and rapid prototyping.',
                    'github'      => 'https://github.com/MTEDdotDev/nx.mtex.dev',
                    'is_deployed' => true,
                ],
                'gh' => [
                    'name'        => 'GitHub Redirect',
                    'description' => 'Redirects to the GitHub repos.',
                    'github'      => 'https://github.com/MTEDdotDev/gh.mtex.dev',
                    'is_deployed' => true,
                ],
                'diff' => [
                    'name'        => 'MTEX Diff',
                    'description' => 'A visual comparison tool for JSON payloads and code.',
                    'github'      => 'https://github.com/MTEDdotDev/diff.mtex.dev',
                    'is_deployed' => true,
                ],
            ],
        ],
        'gimy.site' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null,
            'github_url'   => 'https://github.com/MTEX-dev/gimy-site',
            'owner'        => 'MTEX-dev',
            'github_owner' => 'https://github.com/MTEX-dev',
            'subdomains'   => null,
        ],
        'urlk.app' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'twch.pics' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'fabianternis.dev' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => 'Personal developer domain.',
            'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'fabianternis.de' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => 'Main personal domain.',
            'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'pleasehireme.eu' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'getmy.name' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'getmy.blog' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'fabian-ternis.de' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => 'Personal domain.',
            'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'mysocials.me' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'getsocials.link' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'linkmy.name' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'kaufenhof.de' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => 'Managed on behalf of a client.',
            'note'         => 'client-managed',
            'github_url'   => null,
            'owner'        => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'woistdasdrachenei.de' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'ivoternis.de' => [
            'from'         => null,
            'to'           => null,
            'status'       => 'active',
            'description'  => 'Personal domain for IvoTernis.',
            'note'         => 'for IvoTernis',
            'github_url'   => 'https://github.com/IvoTernis',
            'owner'        => 'IvoTernis',
            'github_owner' => 'https://github.com/IvoTernis',
            'subdomains'   => null,
        ],
        'heimatverein-floersheim-dalsheim.de' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        '192-168-0-1.de' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null,
            'note'         => '127-0-0-1.de was already taken',
            'github_url'   => null,
            'owner'        => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'sandbox-api.de' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'api-sandbox.de' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null,
            'github_url'   => 'https://github.com/api-sandbox-DE',
            'owner'        => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'hhg-kl.eu' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null, 'github_url' => null,
            'owner' => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'mail-free.eu' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null,
            'github_url'   => 'https://github.com/mail-free',
            'owner'        => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'ternis.eu' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null,
            'github_url'   => 'https://github.com/ternis-eu',
            'owner'        => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'xpsystems.de' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null,
            'github_url'   => 'https://github.com/xpsystems',
            'owner'        => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'eu-data.org' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null,
            'github_url'   => 'https://github.com/eu-data-org',
            'owner'        => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'eu-search.org' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null,
            'github_url'   => 'https://github.com/eu-search-org',
            'owner'        => null, 'github_owner' => null, 'subdomains' => null,
        ],
        'web-search.org' => [
            'from' => null, 'to' => null, 'status' => 'active',
            'description' => null, 'note' => null,
            'github_url'   => 'https://github.com/web-searchorg',
            'owner'        => null, 'github_owner' => null, 'subdomains' => null,
        ],

    ],
];