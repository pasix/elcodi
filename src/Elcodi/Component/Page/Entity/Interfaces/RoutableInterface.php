<?php

/*
 * This file is part of the Elcodi package.
 *
 * Copyright (c) 2014 Elcodi.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Marc Morera <yuhu@mmoreram.com>
 * @author Aldo Chiecchia <zimage@tiscali.it>
 */

namespace Elcodi\Component\Page\Entity\Interfaces;

/**
 * Interface RoutableInterface
 *
 * @author Cayetano Soriano <neoshadybeat@gmail.com>
 * @author Jordi Grados <planetzombies@gmail.com>
 * @author Damien Gavard <damien.gavard@gmail.com>
 * @author Jonas HAOUZI <haouzijonas@gmail.com>
 * @author Àlex Corretgé <alex@corretge.cat>
 * @author Berny Cantos <be@rny.cc>
 */
interface RoutableInterface
{
    /**
     * Get the path
     *
     * @return string
     */
    public function getPath();

    /**
     * Set the path
     *
     * @param string $path The path
     *
     * @return $this Self Object
     */
    public function setPath($path);
}
