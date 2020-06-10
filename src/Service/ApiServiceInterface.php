<?php
declare(strict_types = 1);

/**
 * CustomerServiceInterface.php
 * testproject
 *
 * Email: andrei.marmureanu@marmureanu.com
 * Date: 10/06/2020
 */

namespace App\Service;

interface ApiServiceInterface
{
    /**
     * @param int $limit
     * @param int $offset
     *
     * @return mixed
     */
    public function listEntity(int $limit, int $offset);

    /**
     * @param int $id
     *
     * @return mixed
     */
    public function getById(int $id);
}
