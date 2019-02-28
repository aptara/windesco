<?php
/*
 * This file is part of the ManageWP Worker plugin.
 *
 * (c) ManageWP LLC <contact@managewp.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class MWP_Crypter_PhpSecLibCrypter implements MWP_Crypter_Interface
{
    public function publicEncrypt($data, $publicKey)
    {
        $this->requireLibrary();

        $rsa = new Crypt_RSA();
        $rsa->setEncryptionMode(CRYPT_RSA_SIGNATURE_PKCS1);
        $rsa->loadKey($publicKey, CRYPT_RSA_PUBLIC_FORMAT_PKCS1);

        $errorCatcher = new MWP_Debug_ErrorCatcher();
        $errorCatcher->register();
        $encrypted = $rsa->encrypt($data);
        $error     = $errorCatcher->yieldErrorMessage(true);

        if ($encrypted === false && $error !== null) {
            throw new MWP_Worker_Exception(MWP_Worker_Exception::PHPSECLIB_ENCRYPT_ERROR, "Error while trying to use OpenSSL to encrypt a message.", array(
                'error' => $error,
            ));
        }

        return $encrypted;
    }

    public function publicDecrypt($data, $publicKey)
    {
        $this->requireLibrary();

        $rsa = new Crypt_RSA();
        $rsa->setEncryptionMode(CRYPT_RSA_SIGNATURE_PKCS1);
        $rsa->loadKey($publicKey, CRYPT_RSA_PUBLIC_FORMAT_PKCS1);

        $errorCatcher = new MWP_Debug_ErrorCatcher();
        $errorCatcher->register();
        $decrypted = $rsa->decrypt($data);
        $error     = $errorCatcher->yieldErrorMessage(true);

        // "Decryption error" is generated by the library when the public key is not correct.
        if ($decrypted === false && $error !== 'Decryption error') {
            throw new MWP_Worker_Exception(MWP_Worker_Exception::PHPSECLIB_DECRYPT_ERROR, "Error while trying to use OpenSSL to decrypt a message.", array(
                'error' => $error,
            ));
        }

        return $decrypted === false ? null : $decrypted;
    }

    private function requireLibrary()
    {
        if (class_exists('Crypt_RSA', false)) {
            return;
        }

        require_once dirname(__FILE__).'/../../PHPSecLib/Crypt/RSA.php';
    }
}
