<?php

declare(strict_types=1);

namespace Prometee\SyliusPayumStripeCheckoutSessionPlugin\Provider;

use Sylius\Component\Core\Model\OrderInterface;

final class PaymentMethodTypesProvider implements PaymentMethodTypesProviderInterface
{
    /**
     * {@inheritDoc}
     */
    public function getPaymentMethodTypes(OrderInterface $order): array
    {
        return [
            'card'
        ];
    }
}
