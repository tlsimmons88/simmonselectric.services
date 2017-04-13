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

		$request = $request = $this->container->get('request_stack')->getCurrentRequest();
		if ($request->getMethod() == 'POST')
		{
			$form->bind($request);

			if ($form->isValid())
			{
				// Perform some action, such as sending an email
				$message = \Swift_Message::newInstance()
					->setSubject('Contact enquiry from SimmonsElectric.services')
					->setFrom($enquiry->getEmail())
					->setTo($this->container->getParameter('app.emails.contact_email'))
					->setBody($this->renderView('AppBundle:Default:contactEmail.txt.twig', array('enquiry' => $enquiry)));
				$this->get('mailer')->send($message);

				//After email is sent show a notifacation on screen to the user
				$this->get('session')->getFlashBag()->add('contact-notice', 'Your email was successfully sent. Thank you!');
			}
		}

		return $this->render('AppBundle:Default:contact.html.twig', array('form' => $form->createView()));
    }
}
