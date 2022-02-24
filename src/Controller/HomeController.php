<?php

namespace App\Controller;

use App\Form\FormType;
use Symfony\Component\Mime\Address;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    // #[Route('/', name: 'home')]
    // public function index(): Response
    // {
    //     return $this->render('home/index.html.twig', [
    //         'controller_name' => 'HomeController',
    //     ]);
    // }

    #[Route('/', name: 'home')]
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createForm(FormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();
            $email = (new TemplatedEmail())
                ->from(new Address($contact['prenom'] . '' . $contact['nom']))
                ->to(new Address('manga.samadjine@3wa.io'))
                ->subject('Portfolio - demande de contact - ' . $contact['objet'])
                ->htmlTemplate('contact/contact_email.html.twig')
                ->context([
                    'prenom' => $contact['prenom'],
                    'nom' => $contact['nom'],
                    'entreprise' => $contact['entreprise'],
                    'adresseEmail' => $contact['email'],
                    'telephone' => $contact['telephone'],
                    'objet' => $contact['objet'],
                    'message' => $contact['message'],
                ]);
            dd($email);
            $mailer->send($email);
            $this->addFlash('success', 'Votre message a été envoyé avec succès.');
        }
        return $this->render('home/index.html.twig', [
            'formContact' => $form->createView(),
        ]);
    }
}
