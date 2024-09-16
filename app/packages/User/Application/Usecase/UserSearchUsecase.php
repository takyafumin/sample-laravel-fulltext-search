<?php

namespace Packages\User\Application\Usecase;

use App\Enums\SearchType;
use Illuminate\Support\LazyCollection;
use Packages\User\Repository\Query\UserSearchQuery;
use Packages\User\Application\Dto\UserSearchDto;
use Packages\User\Repository\Query\ISearchQuery;
use Packages\User\Repository\Query\UserSearchDatabaseQuery;
use Packages\User\Repository\Query\UserSearchMeilisearchQuery;

/**
 * ユーザー検索 Usecase
 */
class UserSearchUsecase
{
    public function __construct(
        private readonly UserSearchDatabaseQuery $userSearchDatabaseQuery,
        private readonly UserSearchMeilisearchQuery $userSearchMeilisearchQuery
    ) {
    }

    /**
     * ユーザー検索
     *
     * @param SearchType $searchType
     * @param string|null $keyword
     * @return LazyCollection<UserSearchDto>
     */
    public function execute(SearchType $searchType, ?string $keyword): LazyCollection
    {
        logger()->info('searchType: ' . $searchType->value);
        return $this->getQuery($searchType)
            ->search($keyword);
    }

    /**
     * 検索クエリを取得
     *  - Factory化してもいいかも
     *
     * @param SearchType $searchType
     * @return UserSearchQuery
     */
    private function getQuery(SearchType $searchType): ISearchQuery
    {
        return match ($searchType) {
            SearchType::DATABASE => $this->userSearchDatabaseQuery,
            SearchType::MEILISEARCH => $this->userSearchMeilisearchQuery,
        };
    }
}
