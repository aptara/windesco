<?php
/*
 * This file is part of the ManageWP Worker plugin.
 *
 * (c) ManageWP LLC <contact@managewp.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class MWP_Worker_Configuration
{

    private $context;

    public function __construct(MWP_WordPress_Context $context)
    {
        $this->context = $context;
    }

    public function getPublicKey()
    {
        return base64_decode($this->context->optionGet('_worker_public_key'));
    }

    public function setPublicKey($publicKey)
    {
        $this->context->optionSet('_worker_public_key', base64_encode($publicKey), true);
    }

    public function deletePublicKey()
    {
        $this->context->optionDelete('_worker_public_key');
    }

    /**
     * @return string
     *
     * @deprecated Use public key instead.
     */
    public function getSecureKey()
    {
        return base64_decode($this->context->optionGet('_worker_nossl_key'));
    }

    /**
     * @param $secureKey
     *
     * @deprecated Use public key instead.
     */
    public function setSecureKey($secureKey)
    {
        $this->context->optionSet('_worker_nossl_key', base64_encode($secureKey));
    }

    public function deleteSecureKey()
    {
        $this->context->optionSet('_worker_nossl_key', '');
    }

    public function getLivePublicKey($keyName)
    {
        $keyData = $this->findKeyData($keyName);
        return $keyData !== null ? $keyData['publicKey'] : null;
    }

    public function isCommunicationKey($keyName)
    {
        $keyData = $this->findKeyData($keyName);
        return ($keyData === null || empty($keyData['useServiceKey']));
    }

    public function getCommunicationStringByKeyName($keyName)
    {
        return $this->isCommunicationKey($keyName) ? mwp_get_communication_key() : mwp_get_service_key();
    }

    protected function findKeyData($keyName)
    {
        $keys = $this->context->optionGet('mwp_public_keys', null);

        if (empty($keys)) {
            mwp_refresh_live_public_keys(array());
            $keys = $this->context->optionGet('mwp_public_keys', null);
        }

        if (empty($keys) || !is_array($keys)) {
            return null;
        }

        foreach ($keys as $key) {
            if (empty($key['id']) || $key['id'] !== $keyName) {
                continue;
            }

            if (empty($key['validFrom']) || empty($key['validTo']) || empty($key['publicKey']) || empty($key['service'])) {
                continue;
            }

            $timeNow = new DateTime();

            if ($timeNow < new DateTime($key['validFrom']) || $timeNow > new DateTime($key['validTo'])) {
                continue;
            }

            return $key;
        }

        return null;
    }
}
