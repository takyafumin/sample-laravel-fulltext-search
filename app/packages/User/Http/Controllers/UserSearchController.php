<?php

namespace Packages\User\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Packages\User\Application\UseCase\UserSearchUseCase;

/**
 * ユーザー検索 Controller
 */
class UserSearchController extends Controller
{
    public function __construct(
        private UserSearchUseCase $userSearchUseCase
    ) {
    }

    /**
     * ユーザー検索
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request) {
        $users = $this->userSearchUseCase->execute();
        return response()->json($users);
    }
}
