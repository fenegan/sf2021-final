<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

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
