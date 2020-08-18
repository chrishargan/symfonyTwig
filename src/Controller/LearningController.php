<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Twig\Extra\Intl\IntlExtension;

class LearningController extends AbstractController
{
    /**
     * @Route("/about-becode", name="aboutMe")
     */
    public function aboutMe(SessionInterface $session)
    {
        $date = new \DateTime();
        if ($session->get('name')) {
            $name = ucfirst($session->get('name'));
            return $this->render('learning/about-me.html.twig', [
                'name' => $name,
                'date' => $date

            ]);

        } else {
            return $this->forward('App\Controller\LearningController::showMyName', [ 'date' => $date]);
        }
    }

    /**
     * @Route("/", name="homepage")                        // in this case we leave route as / so that it become the defacto homepage.
     */
    public function showMyName(SessionInterface $session)
    {
        $name = 'Anonymous';
        if ($session->get('name')) {                     // if there has been a name posted in the session then it becomes the 'name' passed into the homepage variable.
            $name = ucfirst($session->get('name'));
        }

        return $this->render('learning/homepage.html.twig', [
            'name' => $name
        ]);
    }

    /**
     * @Route("/changeMyName", name="changeMyName")    // even though this is redirecting to the same page it should have its own unique name and route.
     * @param Request $request
     * @param SessionInterface $session
     * @return RedirectResponse
     */
    public function changeMyName(Request $request, SessionInterface $session)
    {
        $name = $request->request->get('name');
        $session->set('name', $name);
        return $this->redirectToRoute('homepage');    //note that it is no longer a render function but a redirectToRoute towards the homepage.

    }


}
