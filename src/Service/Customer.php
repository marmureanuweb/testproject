<?php
declare(strict_types = 1);

/**
 * Customer
 *
 * @copyright Copyright © 2020 Marmureanu. All rights reserved.
 * @author    marmureanuweb@marmureanu.ro
 */

namespace App\Service;

use App\Repository\CustomerRepository;

class Customer implements ApiServiceInterface
{
    /**
     * @var \App\Repository\CustomerRepository
     */
    private $customerRepository;

    /**
     * Customer constructor.
     *
     * @param \App\Repository\CustomerRepository $customerRepository
     */
    public function __construct
    (
        CustomerRepository $customerRepository
    ) {
        $this->customerRepository = $customerRepository;
    }

    /**
     * @param int $limit
     * @param int $offset
     *
     * @return array
     */
    public function listEntity(int $limit = 10, int $offset = 0)
    {
        $result = [];
        $customers = $this->customerRepository->getEnabledCustomers($limit, $offset);
        /** @var \App\Entity\Customer $customer */
        foreach ($customers as $c => $customer) {
            $result[$c] = $customer->toArray();
        }

        return $result;
    }

    public function getById(int $id)
    {
        $customer = $this->customerRepository->getCustomerById($id);
        return $customer->toArray();
    }
}
