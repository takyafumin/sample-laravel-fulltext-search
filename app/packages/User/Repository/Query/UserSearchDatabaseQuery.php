<?php

namespace Packages\User\Repository\Query;

use App\Models\User;
use App\Repository\Query\Trait\WhereLike;
use Illuminate\Support\LazyCollection;
use Packages\User\Application\Dto\UserSearchDto;

/**
 * ユーザー検索クエリ
 */
class UserSearchDatabaseQuery implements ISearchQuery
{
    use WhereLike;

    /**
     * ユーザー検索
     *
     * @param string|null $keyword
     * @return LazyCollection<UserSearchDto>
     */
    public function search(?string $keyword): LazyCollection
    {
        $query = User::query();

        if (!is_null($keyword)) {
            $query = $this->whereLikeWithEscape($query, 'name', $keyword);
        }

        return $query->cursor()
            ->map(function (User $user) {
            return new UserSearchDto($user);
        });
    }
}
