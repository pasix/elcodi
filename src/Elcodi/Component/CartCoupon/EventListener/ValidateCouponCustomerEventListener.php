<?php declare(strict_types=1);

namespace Elcodi\Component\CartCoupon\EventListener;

use Elcodi\Component\CartCoupon\Event\CartCouponOnCheckEvent;
use Elcodi\Component\CartCoupon\Services\CartCouponCustomerValidator;

class ValidateCouponCustomerEventListener
{
    /** @var CartCouponCustomerValidator */
    private $couponCustomerValidator;

    public function __construct(CartCouponCustomerValidator $couponCustomerValidator)
    {
        $this->couponCustomerValidator = $couponCustomerValidator;
    }

    /**
     * Check if cart meets basic requirements for a coupon.
     *
     * @param CartCouponOnCheckEvent $event
     *
     * @throws AbstractCouponException
     */
    public function validateCoupon(CartCouponOnCheckEvent $event)
    {
        $this->couponCustomerValidator->validateCartCouponCutomer(
            $event->getCart(),
            $event->getCoupon()
        );
    }
}
