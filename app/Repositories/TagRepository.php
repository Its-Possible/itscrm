<?php

namespace App\Repositories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class TagRepository {

    private Tag $tag;
    private int $limit = 10;

    public function __construct()
    {
        $this->tag = new Tag();
    }

    public function all(): Collection
    {
        return $this->tag->all();
    }

    /**
     * Get all doesn't have customer id
     *
     * @param $customer_id Customer ID
     * @return Collection
     */
    public function whereDoesntHaveCustomer(int $customer_id): Collection
    {
        return $this->tag->whereDoesntHave('customers', function (Builder $query) use ($customer_id) {
            $query->where('customers.id', $customer_id);
        })->limit(8)->get();
    }

    /**
     * Get all doesn't have customer id and search by name
     *
     * @param int $customer_id Customer ID
     * @param string $value Value to search by tag name
     * @return mixed
     */
    public function searchByNameWhereDoesntHaveCustomer(int $customer_id, string $value): Collection
    {
        return $this->tag->where('name', 'like', "{$value}%")->whereDoesntHave('customers', function (Builder $query) use ($customer_id) {
            $query->where('customers.id', $customer_id);
        })->limit(8)->get();
    }
}
