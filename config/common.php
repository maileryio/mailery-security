<?php

declare(strict_types=1);

use Mailery\Security\Security;

return [
    Security::class => [
        '__construct()' => [
            'encryptKey' => $params['maileryio/mailery-security']['secretKey'],
        ],
    ],
];
