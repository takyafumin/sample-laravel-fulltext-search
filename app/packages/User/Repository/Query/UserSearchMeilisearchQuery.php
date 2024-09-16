<?php

namespace Packages\User\Repository\Query;

use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\LazyCollection;
use Packages\User\Application\Dto\UserSearchDto;

/**
 * ユーザー検索クエリ(meilisearch)
 */
class UserSearchMeilisearchQuery implements ISearchQuery
{
    /**
     * ユーザー検索
     *
     * @param string|null $keyword
     * @return LazyCollection<UserSearchDto>
     */
    public function search(?string $keyword): LazyCollection
    {
        $users = User::search($keyword)
            ->query(fn (Builder $query) => $query->cursor()); // ここでEloquentModelに対してfilterできる

        return $users->cursor()
            ->map(function (User $user) {
            return new UserSearchDto($user);
        });
    }
}
