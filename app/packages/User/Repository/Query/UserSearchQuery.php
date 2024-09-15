<?php

namespace Packages\User\Repository\Query;

use App\Models\User;
use Illuminate\Support\LazyCollection;
use Packages\User\Application\Dto\UserSearchDto;

/**
 * ユーザー検索クエリ
 */
class UserSearchQuery
{
    /**
     * ユーザー検索
     *
     * @return LazyCollection<UserSearchDto>
     */
    public function search(): LazyCollection
    {
        return User::query()
            ->cursor()
            ->map(function (User $user) {
            return new UserSearchDto($user);
        });
    }
}
