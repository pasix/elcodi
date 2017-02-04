<?php

/*
 * This file is part of the Elcodi package.
 *
 * Copyright (c) 2014-2016 Elcodi Networks S.L.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Marc Morera <yuhu@mmoreram.com>
 * @author Aldo Chiecchia <zimage@tiscali.it>
 * @author Elcodi Team <tech@elcodi.com>
 */

namespace Elcodi\Component\Product\Factory;

use Doctrine\Common\Collections\ArrayCollection;

use Elcodi\Component\Currency\Factory\Abstracts\AbstractPurchasableFactory;
use Elcodi\Component\Product\ElcodiProductStock;
use Elcodi\Component\Product\Entity\Variant;

/**
 * Factory for Variant entities.
 */
class VariantFactory extends AbstractPurchasableFactory
{
    /**
     * @var bool
     *
     * Use use stock
     */
    public $useStock = false;

    /**
     * Set use stock.
     *
     * @param bool $useStock Infinite stock
     *
     * @return $this Self object
     */
    public function setUseStock($useStock = false)
    {
        $this->useStock = $useStock;

        return $this;
    }

    /**
     * Creates and returns a pristine Variant instance.
     *
     * Prices are initialized to "zero amount" Money value objects,
     * using injected CurrencyWrapper default Currency
     *
     * @return Variant New Variant entity
     */
    public function create()
    {
        $zeroPrice = $this->createZeroAmountMoney();

        $stock = $this->useStock
            ? 0
            : ElcodiProductStock::INFINITE_STOCK;

        /**
         * @var Variant $variant
         */
        $classNamespace = $this->getEntityNamespace();
        $variant = new $classNamespace();
        $variant
            ->setSku('')
            ->setStock($stock)
            ->setPrice($zeroPrice)
            ->setReducedPrice($zeroPrice)
            ->setImages(new ArrayCollection())
            ->setOptions(new ArrayCollection())
            ->setWidth(0)
            ->setHeight(0)
            ->setWidth(0)
            ->setDepth(0)
            ->setWeight(0)
            ->setImagesSort('')
            ->setEnabled(true)
            ->setCreatedAt($this->now());

        return $variant;
    }
}
