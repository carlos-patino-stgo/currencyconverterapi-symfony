<?php

namespace App\Controller\Api;

use App\Entity\Conversion;
use App\Form\ConversionType;
use App\Service\FreeCurrconvService;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ConversionsController extends AbstractController
{
    private FreeCurrconvService $freeCurrconvService;

    /**
     * ConversionsController constructor.
     * @param $freeCurrconvService
     */
    public function __construct(FreeCurrconvService $freeCurrconvService)
    {
        $this->freeCurrconvService = $freeCurrconvService;
    }

    /**
     * Store Conversion
     *
     * @Route("/api/convertor", name="api_convertor", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        try {
            $data = json_decode($request->getContent(), true);
            $currencyConvertor = $this->freeCurrconvService
                ->convertCurrency($data['from_currency'], $data['to_currency']);

            $data['current_value_of_the_currency'] = $currencyConvertor;
            $data['amount_convertor'] = $data['amount'] * $currencyConvertor;
            $clickbusConvertor = new Conversion();

            $form = $this->createForm(ConversionType::class, $clickbusConvertor, array('csrf_protection' => false));

            $form->handleRequest($request);
            $form->submit($data);

            if (!$form->isValid()) {
                $errors = [];

                foreach ($form->getErrors(true, true) as $error) {
                    $errors[$error->getOrigin()->getName()] = $error->getMessage();
                }

                return $this->json([
                    "errors" => [
                        "status" => 400,
                        "title"  => "Bad Request",
                        "detail" => $errors
                    ]
                ], 400);
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($clickbusConvertor);
            $entityManager->flush();

            return $this->json([
                "data" => $clickbusConvertor->getAmountConvertor()
            ], 200);
        } catch (Exception $e) {
            return $this->json([
                "errors" => [
                    "status" => 500,
                    "title"  => "Server Error",
                    "detail" => [
                        'error' => $e->getMessage()
                    ]
                ]
            ], 500);
        }
    }

    /**
     * Get all conversions
     *
     * @Route("/api/conversions", name="api.conversions.conversions", methods={"GET"})
     *
     * @return Response
     */
    public function getConversions(): Response
    {
        $conversions = $this->getDoctrine()
            ->getRepository(Conversion::class)
            ->findAll();

        return $this->json([
            "data" => $conversions
        ], 200);
    }
}
