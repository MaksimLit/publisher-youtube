<?php
declare(strict_types = 1);

namespace App\Exception;

use RuntimeException;
use Symfony\Component\HttpFoundation\Response;

class BookCategoryNotFoundException extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('book category not fount', Response::HTTP_NOT_FOUND);
    }
}
