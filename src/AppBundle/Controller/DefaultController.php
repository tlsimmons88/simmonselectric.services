<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
	/**
	 * Display Home Page
	 * @param Request $request
	 * @return string - view
	 */
	public function indexAction(Request $request)
    {
       return $this->render('AppBundle:Default:index.html.twig');
    }

	/**
	 * Display Services Page
	 * @param Request $request
	 * @return string - view
	 */
	public function servicesAction(Request $request)
    {
       return $this->render('AppBundle:Default:services.html.twig');
    }

	/**
	 * Display Portfolio Page
	 * @param Request $request
	 * @return string - view
	 */
	public function portfolioAction(Request $request)
    {
       return $this->render('AppBundle:Default:portfolio.html.twig');
    }

	/**
	 * Display Contact Page
	 * @param Request $request
	 * @return string - view
	 */
	public function contactAction(Request $request)
    {
       return $this->render('AppBundle:Default:contact.html.twig');
    }
}
