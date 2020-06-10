<?php
declare(strict_types = 1);

/**
 * ApiEntityInterface
 *
 * @copyright Copyright © 2020 Marmureanu. All rights reserved.
 * @author    marmureanuweb@marmureanu.ro
 */

namespace App\Entity;


interface ApiEntityInterface
{

    /**
     * @return array
     */
    public function toArray():array;
}
