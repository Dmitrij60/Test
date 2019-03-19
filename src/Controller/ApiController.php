<?php

namespace App\Controller;

use App\Entity\Message;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Helper\MessageChecker;

class ApiController extends AbstractController
{
    /**
     * @Route("/api/status", name="api-status")
     */
    public function status()
    {
        return $this->json([
            'status' => 'OK',
        ]);
    }

    /**
     * @Route("/api/message", name="api_message", methods={"POST"})
     */
    public function sendMessage(ValidatorInterface $validator, Request $request)
    {
        $checker = new MessageChecker($validator);
        $result = $checker->check($request);

        return $this->json($result, $result['success'] ? 500 : 200);
    }
}
