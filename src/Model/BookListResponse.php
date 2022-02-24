<?php
declare(strict_types = 1);

namespace App\Model;


class BookListResponse
{
    private array $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }
}
