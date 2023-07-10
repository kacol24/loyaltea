<?php

namespace App\GraphQL\Traits;

trait HasPagination
{
    protected function paginatorInfo($paginator)
    {
        return [
            'count'        => $paginator->count(),
            'currentPage'  => $paginator->currentPage(),
            'firstItem'    => $paginator->firstItem(),
            'hasMorePages' => $paginator->hasMorePages(),
            'lastItem'     => $paginator->lastItem(),
            'lastPage'     => $paginator->lastPage(),
            'perPage'      => $paginator->perPage(),
            'total'        => $paginator->total(),
        ];
    }
}
