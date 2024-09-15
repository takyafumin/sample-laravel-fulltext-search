<?php

namespace Packages\User\Application\Usecase;

use Illuminate\Support\LazyCollection;
use Packages\User\Repository\Query\UserSearchQuery;
use Packages\User\Application\Dto\UserSearchDto;

/**
 * ユーザー検索 Usecase
 */
class UserSearchUsecase
{
    public function __construct(
        private readonly UserSearchQuery $userSearchQuery
    ) {
    }

    /**
     * ユーザー検索
     *
     * @return LazyCollection<UserSearchDto>
     */
    public function execute(): LazyCollection
    {
        return $this->userSearchQuery->search();
    }
}
