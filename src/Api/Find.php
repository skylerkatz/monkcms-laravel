<?php

namespace Monkdev\MonkCms\Api;

class Find
{
    public const BASIC = 'find';
    public const BY_ID = 'find_id';

    public const BY_SITE_SLUG = 'find_site';

    public const CATEGORY = 'find_category';
    public const CATEGORIES = 'find_category';

    public const PARENT_CATEGORY = 'find_parent_category';
    public const PARENT_CATEGORIES = 'find_parent_category';

    public const GROUP = 'find_group';
    public const GROUPS = 'find_group';

    public const SERIES = 'find_series';

    public const YEAR = 'find_year';
    public const MONTH = 'find_month';

    public const AUTHOR = 'find_author';
    public const AUTHORS = 'find_author';
    public const PREACHER = 'find_preacher';
    public const PREACHERS = 'find_preacher';

    public const BIBLE_PASSAGE = 'find_passage';

    public const TAG = 'find_tag';
    public const TAGS = 'find_tag';
    /**
     * Find params that need to have slugged params.
     *
     * @return string[]
     */
    public static function sluggableFinds(): array
    {
        return [
            self::AUTHOR,
            self::AUTHORS,
            self::PREACHERS,
            self::TAG,
            self::TAGS,
            self::BY_SITE_SLUG,
        ];
    }
}
