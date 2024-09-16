<?php

namespace App\Enums;

/**
 * 検索タイプ
 */
enum SearchType: string
{
    /**
     * データベース
     */
    case DATABASE = 'database';

    /**
     * meilisearch
     */
    case MEILISEARCH = 'meilisearch';
}
