<?php
/**
 * Created by PhpStorm.
 * User: rojo
 * Date: 21/11/2018
 * Time: 22:52
 */
namespace DamNT\LoyaltyCard\Observer;

use Magento\Framework\Event\Observer;
use Magento\Payment\Observer\AbstractDataAssignObserver;
use Magento\Quote\Api\Data\PaymentInterface;

class DataAssignObserver extends AbstractDataAssignObserver
{
    const LOYALTY_CARD = 'loyalty_card';

    /**
     * @var array
     */
    protected $additionalInformationList = [
        self::LOYALTY_CARD,
    ];

    /**
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        //https://devdocs.magento.com/guides/v2.2/payments-integrations/base-integration/get-payment-info.html
        $data = $this->readDataArgument($observer);

        $additionalData = $data->getData(PaymentInterface::KEY_ADDITIONAL_DATA);
        if (!is_array($additionalData)) {
            return;
        }

        $paymentInfo = $this->readPaymentModelArgument($observer);

        foreach ($this->additionalInformationList as $additionalInformationKey) {
            if (isset($additionalData[$additionalInformationKey])) {
                $paymentInfo->setAdditionalInformation(
                    $additionalInformationKey,
                    $additionalData[$additionalInformationKey]
                );
            }
        }
    }
}