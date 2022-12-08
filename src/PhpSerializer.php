<?php

declare(strict_types=1);

/**
 * Security module for Mailery Platform
 * @link      https://github.com/maileryio/mailery-security
 * @package   Mailery\Security
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2022, Mailery (https://mailery.io/)
 */

namespace Mailery\Security;

class PhpSerializer implements SerializerInterface
{
    /**
     * @inheritdoc
     */
    public function serialize(mixed $data): string
    {
        return serialize($data);
    }

    /**
     * @inheritdoc
     */
    public function deserialize(string $data): mixed
    {
        return unserialize($data);
    }
}
