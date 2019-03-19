<?php

namespace App\Helper;

use App\Entity\Message;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validator\ValidatorInterface;




/**
 * Хелпер для валидации запроса для сообщения
 */
class MessageChecker
{
    protected $validator;

    /**
     * @var ValidatorInterface $validator Валидатор
     */
    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    /**
     * Валидировать запрос для сообщения
     * @var Request $request HTTP-запрос
     * @return array
     */
    public function check(Request $request): array
    {
        $entity = new Message();
        $entity->setName($request->get('name'));
        $entity->setEmail($request->get('email'));
        $entity->setMessage($request->get('message'));

        $errors = $this->validator->validate($entity);
        $success = count($errors) === 0;

        $result = ['success' => $success];

        if (!$success) {
            $result['errorBag'] = [];
            foreach ($errors as $error) {
                $result['errorBag'][$error->getPropertyPath()] = $error->getMessage();
            }
        }

        return $result;
    }
}