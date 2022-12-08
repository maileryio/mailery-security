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

interface SerializerInterface
{
    /**
     * @param mixed $data
     * @return string
     */
    public function serialize(mixed $data): string;

    /**
     * @param string $data
     * @return mixed
     */
    public function deserialize(string $data): mixed;
}
