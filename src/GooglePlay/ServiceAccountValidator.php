<?php

namespace ReceiptValidator\GooglePlay;

class ServiceAccountValidator
{
    /**
     * @var \ReceiptValidator\GooglePlay\Validator
     */
    private $validator;

    /**
     * ServiceAccountValidator constructor.
     *
     * @param array $options
     * @param bool  $validationModePurchase
     *
     * @throws \Google_Exception
     */
    public function __construct($options = [], $validationModePurchase = false)
    {
        $googleClient = new \Google_Client();
        $googleClient->setScopes([\Google_Service_AndroidPublisher::ANDROIDPUBLISHER]);
        $googleClient->setApplicationName($options['application_name']);
        $googleClient->setAuthConfig($options['path_to_service_account_json']);

        $this->validator = new \ReceiptValidator\GooglePlay\Validator(
            new \Google_Service_AndroidPublisher($googleClient),
            $validationModePurchase
        );
    }

    /**
     * @return Validator
     */
    public function getValidator()
    {
        return $this->validator;
    }
}
