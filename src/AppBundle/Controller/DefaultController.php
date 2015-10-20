<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $headBlock = $this->get('doctrine')
            ->getRepository('AppBundle:HeadBlock')
            ->findAll()
        ;
        $headBlock = $headBlock[0];

        return $this->render('AppBundle:Default:index.html.twig', array(
            'headBlock' => $headBlock
        ));
    }
    /**
     * @Route("/ajax", name="ajax_route")
     */
    public function ajaxAction(Request $request)
    {
        $feedbackName = $request->request->get('feedbackName');
        $feedbackPhone = $request->request->get('feedbackPhone');
        if (!empty($feedbackName) && !empty($feedbackPhone)) {
            $requestItem = $request->request->get('feedbackAction');
            switch ($requestItem) {
                case 'advice':
                    $requestItem = 'Консультация';
                    break;
                case 'request':
                    $requestItem = 'Заявка';
                    break;
                default:
                    $requestItem = 'Без метки';
            }
            // Сообщение
            $message = $this->renderView(
            // app/Resources/views/Emails/registration.html.twig
                'Emails/registration.html.twig',
                array(
                    'feedbackName' => $feedbackName,
                    'feedbackPhone' => $feedbackPhone,
                )
            );

            // На случай если какая-то строка письма длиннее 70 символов мы используем wordwrap()
            $message = wordwrap($message, 70, "\r\n");

            // Отправляем
//            mail('winder84@mail.ru', 'Сообщение с сайта "Городские ремонты" - "' . $requestItem .'"', $message);
            mail('winder84@mail.ru,gorodskieremonti@yandex.ru', 'Сообщение с сайта "Городские ремонты" - "' . $requestItem .'"', $message);
            $response = new Response(json_encode(array(
                'success' => 'true',
                'msg' => 'Спасибо за оставленную заявку. Мы свяжемся с Вами в ближайшее время.'
            )));
        } else {
            $response = new Response(json_encode(array(
                'success' => 'false',
                'errorMsg' => 'Не заполнены обязательные поля!'
            )));
        }
        return $response;
    }
}
