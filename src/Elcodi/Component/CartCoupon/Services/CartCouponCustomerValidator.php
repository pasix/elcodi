<?php declare(strict_types=1);

namespace Elcodi\Component\CartCoupon\Services;

use Elcodi\Component\Cart\Entity\Interfaces\CartInterface;
use Elcodi\Component\Cart\Repository\OrderRepository;
use Elcodi\Component\CartCoupon\Exception\CouponOnceForUserException;
use Elcodi\Component\CartCoupon\Repository\OrderCouponRepository;
use Elcodi\Component\Coupon\Entity\Interfaces\CouponInterface;
use Elcodi\Component\User\Entity\Interfaces\CustomerInterface;

class CartCouponCustomerValidator
{
    /**
     * @var OrderCouponRepository
     */
    private $orderCouponRepository;

    public function __construct(OrderCouponRepository $orderCouponRepository)
    {
        $this->orderCouponRepository = $orderCouponRepository;
    }

    public function validateCartCouponCutomer(
        CartInterface $cart,
        CouponInterface $coupon
    ) {
        if(!$coupon->isOnceForUser()) {
            return ;
        }

        if(!$cart->getCustomer() instanceof CustomerInterface) {
            return ;
        }
        
        $r = $this->orderCouponRepository
            ->createQueryBuilder('orderCoupon')
            ->select('count(orderCoupon.id)')
            ->innerJoin('orderCoupon.order', 'order')
            ->innerJoin('order.customer', 'customer')
            ->innerJoin('orderCoupon.coupon', 'c')
            ->where('c.id = :couponId')
            ->andWhere('customer.id = :customerId')
            ->setParameter('couponId', $coupon->getId())
            ->setParameter('customerId', $cart->getCustomer()->getId())
            ->getQuery()
            ->getSingleScalarResult();

        if($r > 0) {
            throw new CouponOnceForUserException();
        }
    }
}
