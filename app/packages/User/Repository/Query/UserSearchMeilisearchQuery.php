<?php

namespace Packages\User\Repository\Query;

use App\Models\User;
use Illuminate\Support\LazyCollection;
use Packages\User\Application\Dto\UserSearchDto;

/**
 * ユーザー検索クエリ(meilisearch)
 */
class UserSearchMeilisearchQuery implements ISearchQuery
{
    /**
     * 取得件数
     */
    private const LIMIT = 100;

    /**
     * ユーザー検索
     *
     * @param string|null $keyword
     * @return LazyCollection<UserSearchDto>
     */
    public function search(?string $keyword): LazyCollection
    {
        $users = User::search($keyword)
            ->take(self::LIMIT)
            ->cursor();
            // ->query(fn (Builder $query) => $query->cursor()); // ここでEloquentModelに対してfilterできる

        return $users
            ->map(function (User $user) {
                return new UserSearchDto($user);
            });
    }
}
