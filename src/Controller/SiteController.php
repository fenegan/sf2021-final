<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Ticket;
use App\Entity\User;

class SiteController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(Request $request)
    {
        return $this->render('site/index.html.twig', [
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request)
    {
        return $this->render('site/contact.html.twig', [
        ]);
    }

    /**
     * @Route("/tickets/{username}", name="get_tickets")
     */
    public function tickets(Request $request, string $username)
    {
        $user = $this->getDoctrine()->getRepository(User::class)
            ->findOneByUsername($username);
        $rep = $this->getDoctrine()->getRepository(Ticket::class);
        $tickets = $rep->findByUser($user);
        return $this->render('site/tickets.html.twig', [
            'tickets' => $tickets
        ]);
    }

    /**
     * @Route("/fr", name="lang_fr")
     */
    public function langFr(Request $request)
    {
        $request->getSession()->set('_locale', 'fr');

        return $this->redirect($request->headers->get('referer'));
    }

    /**
     * @Route("/en", name="lang_en")
     */
    public function langEn(Request $request)
    {
        $request->getSession()->set('_locale', 'en');

        return $this->redirect($request->headers->get('referer'));
    }
}
