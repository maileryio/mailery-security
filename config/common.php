<?php

declare(strict_types=1);

/**
 * Security module for Mailery Platform
 * @link      https://github.com/maileryio/mailery-security
 * @package   Mailery\Security
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2022, Mailery (https://mailery.io/)
 */

use Mailery\Security\PhpSerializer;
use Mailery\Security\Security;
use Yiisoft\Definitions\Reference;

return [
    Security::class => [
        '__construct()' => [
            'encryptKey' => $params['maileryio/mailery-security']['secretKey'],
            'serializer' => Reference::to(PhpSerializer::class),
        ],
    ],
];
