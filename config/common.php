<?php

declare(strict_types=1);

/**
 * Security module for Mailery Platform
 * @link      https://github.com/maileryio/mailery-security
 * @package   Mailery\Security
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2022, Mailery (https://mailery.io/)
 */

use Mailery\Security\Security;

return [
    Security::class => [
        '__construct()' => [
            'encryptKey' => $params['maileryio/mailery-security']['secretKey'],
        ],
    ],
];
