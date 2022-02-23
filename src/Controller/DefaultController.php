<?php

namespace App\Controller;

use App\Entity\Book;
use App\Repository\BookRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * DefaultController constructor.
     */
    public function __construct(private BookRepository $bookRepository, private EntityManagerInterface $em)
    {
    }

    #[Route('/book/add', name: 'app_books_add')]
    public function add(): JsonResponse
    {
        $book = new Book();
        $book->setTitle('Test book');

        $this->em->persist($book);
        $this->em->flush();

        return $this->json();
    }

    #[Route('/books', name: 'app_books')]
    public function showAllBooks(): JsonResponse
    {
        $books = $this->bookRepository->findAll();

        return $this->json($books, 200);
    }

    #[Route('/', name: 'default')]
    public function index(): Response
    {
        return $this->json('test', 200);
    }
}
