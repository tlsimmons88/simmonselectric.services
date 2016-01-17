<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Enquiry;
use AppBundle\Form\EnquiryType;

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
		$enquiry = new Enquiry();
		$form = $this->createForm(new EnquiryType(), $enquiry);

		$request = $this->getRequest();
		if ($request->getMethod() == 'POST')
		{
			$form->bind($request);

			if ($form->isValid())
			{
				// Perform some action, such as sending an email

				// Redirect - This is important to prevent users re-posting
				// the form if they refresh the page
				return $this->redirect($this->generateUrl('contact'));
			}
		}

		return $this->render('AppBundle:Default:contact.html.twig', array('form' => $form->createView()));
		//return $this->render('AppBundle:Default:contact.html.twig');
    }
}
