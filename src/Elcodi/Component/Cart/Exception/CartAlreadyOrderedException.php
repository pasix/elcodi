<?php

namespace Elcodi\Component\Cart\Exception;

use Elcodi\Component\Cart\Entity\Interfaces\CartInterface;
use Exception;

/**
 * CartAlreadyOrderedException.
 */
final class CartAlreadyOrderedException extends Exception
{
    /**
     * @var CartInterface
     */
    private $cart;

    public static function create(CartInterface $cart)
    {
        $static = new static();

        $static->setCart($cart);

        return $static;
    }

    /**
     * @return int
     */
    public function getCart(): CartInterface
    {
        return $this->cart;
    }

    /**
     * @param int $cartId
     */
    public function setCart(CartInterface $cart)
    {
        $this->cart = $cart;

        return $this;
    }
}
