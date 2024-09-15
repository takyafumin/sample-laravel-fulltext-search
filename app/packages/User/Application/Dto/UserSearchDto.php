<?php

namespace Packages\User\Application\Dto;

use App\Models\User;

/**
 * ユーザー検索DTO
 */
class UserSearchDto
{
    /**
     * ユーザーID
     *
     * @var integer
     */
    public readonly int $id;

    /**
     * ユーザー名
     *
     * @var string
     */
    public readonly string $name;

    /**
     * メールアドレス
     *
     * @var string
     */
    public readonly string $email;

    public function __construct(User $user)
    {
        $this->id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
    }
}
