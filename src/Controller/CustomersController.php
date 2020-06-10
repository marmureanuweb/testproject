<?php

namespace App\Controller;

use App\Service\Customer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class CustomersController extends AbstractController
{
    /**
     * @var \App\Service\Customer
     */
    private $customerService;

    /**
     * CustomersController constructor.
     *
     * @param \App\Service\Customer                      $customer
     */
    public function __construct(
        Customer $customer
    ) {
        $this->customerService = $customer;
    }

    /**
     * @Route("/custom_api/customers", name="list_customers")
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {
        $response = new JsonResponse();
        $customers = $this->customerService->listEntity();
        if (!empty($customers)) {
            $response->setData($customers);
        }

        return $response;
    }

    /**
     * @Route("/custom_api/customers/{id}", name="get_customer")
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getCustomer(Request $request)
    {
        $response = new JsonResponse();
        $customer = $this->customerService->getById($request->get('id'));
        if (!empty($customer)) {
            $response->setData($customer);
        }

        return $response;
    }
}
