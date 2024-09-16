<?php

namespace Packages\User\Repository\Query;

use Illuminate\Support\LazyCollection;
use Packages\User\Application\Dto\UserSearchDto;

/**
 * 検索クエリインターフェース
 */
interface ISearchQuery
{
    /**
     * 検索
     *
     * @param string|null $keyword
     * @return LazyCollection<UserSearchDto>
     */
    public function search(?string $keyword): LazyCollection;
}
