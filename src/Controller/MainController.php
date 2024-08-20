<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/', name: 'app_')]
class MainController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('main/index.html.twig');
    }

    #[Route('/l-association', name: 'asso')]
    public function asso(): Response
    {
        return $this->render('main/asso.html.twig');
    }

    #[Route('/le-topo', name: 'topo')]
    public function topo(): Response
    {
        return $this->render('main/topo.html.twig');
    }

    #[Route('/le-festival', name: 'festival')]
    public function festival(): Response
    {
        return $this->render('main/festival.html.twig');
    }

    #[Route('/le-shop', name: 'shop')]
    public function shop(): Response
    {
        return $this->render('main/shop.html.twig');
    }

    #[Route('/contact', name: 'contact')]
    public function contact(MailerInterface $mailer, Request $request): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $email = (new TemplatedEmail())
                ->to('contact.dblokes@gmail.com')
                ->from($data['email'])
                ->replyTo($data['email'])
                ->subject('Nouveau message depuis dblokes.fr')
                ->htmlTemplate('emails/contact.html.twig')
                ->context(['lastname' => $data['lastname'], 'firstname' => $data['firstname'], 'mail' => $data['email'], 'phone' => $data['phone'], 'message' => $data['message']]);
            try {
                $mailer->send($email);
                $this->addFlash('success', 'Votre message a bien été envoyé !');
                return $this->redirectToRoute('app_contact');
            } catch (TransportExceptionInterface $e) {
                $this->addFlash('danger', 'Une erreur est survenue !');
            }
        }
        return $this->render('main/contact.html.twig', [
            'form' => $form,
        ]);
    }
}
