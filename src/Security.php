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
     * @param SerializerInterface|null $serilizer
     */
    public function __construct(
        private readonly string $encryptKey,
        private ?SerializerInterface $serilizer = null
    ) {
        if ($this->serilizer === null) {
            $this->serilizer = new PhpSerializer();
        }
    }

    /**
     * @param SerializerInterface $serilizer
     * @return self
     */
    public function withSerializer(SerializerInterface $serilizer): self
    {
        $new = clone $this;
        $new->serilizer = $serilizer;

        return $new;
    }

    /**
     * @param array $params
     * @return string
     */
    public function encrypt(array $params): string
    {
        return base64_encode(
            (string) (new Crypt())->encryptByKey(
                $this->serilizer->serialize($params),
                $this->encryptKey
            )
        );
    }

    /**
     * @param string $string
     * @return array
     */
    public function decrypt(string $string): array
    {
        return $this->serilizer->deserialize(
            (new Crypt())->decryptByKey(
                base64_decode($string, true),
                $this->encryptKey
            )
        );
    }
}
