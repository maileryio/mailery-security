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

class MappedSerializer implements SerializerInterface
{
    /**
     * @param array $map
     */
    public function __construct(
        private readonly array $map
    ) {
    }

    /**
     * @inheritdoc
     */
    public function serialize(mixed $data): string
    {
        if (is_array($data)) {
            foreach ($this->map as $key => $alias) {
                if (!isset($data[$key])) {
                    continue;
                }

                $data[$alias] = $data[$key];
                unset($data[$key]);
            }
        }

        return serialize($data);
    }

    /**
     * @inheritdoc
     */
    public function deserialize(string $data): mixed
    {
        $data = unserialize($data);

        if (is_array($data)) {
            foreach ($this->map as $key => $alias) {
                if (!isset($data[$alias])) {
                    continue;
                }

                $data[$key] = $data[$alias];
                unset($data[$alias]);
            }
        }

        return $data;
    }
}
