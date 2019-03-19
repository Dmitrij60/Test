<?php

namespace App\Controller;

use App\Entity\Message;
use App\Form\MessageType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


use Symfony\Component\Validator\Validator\ValidatorInterface;

class DefaultController extends AbstractController
{
    /**
     * @Route("/default", name="default")
     */
    public function index(Request $request)
    {
        $message = new Message();
        $form = $this->createForm(MessageType::class, $message);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $this->addFlash('sent', 'Success!');
            } else {
                $this->addFlash('sent', 'Fail!');
            }
        }

print_r(count(array('message.name.not_blank' => 'Some error!')));


        return $this->render('default/message.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
