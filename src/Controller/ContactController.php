<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class ContactController extends AbstractController
{
    public function __construct(
        private ContactRepository $contactRepository,
        private EntityManagerInterface $entityManager,
    ) {}

    #[Route('/', name: 'app_contact_index')]
    public function index(Request $request, PaginatorInterface $paginator): Response
    {
        $contacts = $this->contactRepository->findAll();

        return $this->render('contact/index.html.twig', [
            // Stránkujte výsledky
            'pagination' => $paginator->paginate(
                $contacts,
                $request->query->getInt('page', 1),
                10
            )
        ]);
    }

    #[Route('/add', name: 'app_contact_add')]
    public function addContact(Request $request): Response
    {
        $contact = new Contact();

        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($contact);
            $this->entityManager->flush();

            // Pridajte flash správu
            $this->addFlash('success', 'Contact added successfully');

            // Presmerujte na zoznam kontaktov alebo inú stránku
            return $this->redirectToRoute('app_contact_index');
        }

        return $this->render('contact/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{slug}', name:'app_contact_edit')]
    public function editContact(Request $request, string $slug): Response
    {
        list($name, $surname) = explode('-', urldecode($slug));

        $contact = $this->contactRepository->findOneBy(['name' => $name, 'surname' => $surname]);

        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();

            $this->addFlash('success', 'Contact updated successfully');

            return $this->redirectToRoute('app_contact_index');
        }

        return $this->render('contact/edit.html.twig', [
            'contact' => $contact,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/delete/{id}', name: 'app_contact_delete')]
    public function deleteContact(int $id): Response
    {
        $contact = $this->contactRepository->find($id);

        if (!$contact) {
            throw $this->createNotFoundException('Contact not found');
        }

        $this->entityManager->remove($contact);
        $this->entityManager->flush();

        return $this->redirectToRoute('app_contact_index');
    }
}
