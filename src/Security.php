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

use Yiisoft\Security\Crypt;

class Security
{
    /**
     * @param string $encryptKey
     * @param SerializerInterface $serializer
     */
    public function __construct(
        private readonly string $encryptKey,
        private SerializerInterface $serializer
    ) {
    }

    /**
     * @param SerializerInterface $serializer
     * @return self
     */
    public function withSerializer(SerializerInterface $serializer): self
    {
        $new = clone $this;
        $new->serializer = $serializer;

        return $new;
    }

    /**
     * @param mixed $params
     * @return string
     */
    public function encrypt(mixed $params): string
    {
        return base64_encode(
            (new Crypt())->encryptByKey(
                $this->serializer->serialize($params),
                $this->encryptKey
            )
        );
    }

    /**
     * @param string $string
     * @return mixed
     */
    public function decrypt(string $string): mixed
    {
        return $this->serializer->deserialize(
            (new Crypt())->decryptByKey(
                base64_decode($string, true),
                $this->encryptKey
            )
        );
    }
}
