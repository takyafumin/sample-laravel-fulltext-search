<?php

namespace Packages\User\Http\Controllers;

use App\Enums\SearchType;
use App\Http\Controllers\Controller;
use Packages\User\Application\UseCase\UserSearchUseCase;
use Packages\User\Http\Requests\UserSearchRequest;

/**
 * ユーザー検索(あいまい検索) Controller
 */
class UserFuzzySearchController extends Controller
{
    public function __construct(
        private UserSearchUseCase $userSearchUseCase
    ) {
    }

    /**
     * ユーザー検索(あいまい検索)
     *
     * @param UserSearchRequest $request
     * @return JsonResponse
     */
    public function __invoke(UserSearchRequest $request) {
        $users = $this->userSearchUseCase->execute(SearchType::MEILISEARCH, $request->keyword);
        return response()->json($users);
    }
}
