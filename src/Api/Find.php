<?php

namespace Monkdev\MonkCms\Api;

class Find
{
    public const BASIC = 'find';
    public const BY_ID = 'find_id';
    public const BY_SLUG = 'find';

    public const BY_SITE_SLUG = 'find_site';

    public const CATEGORY = 'find_category';
    public const CATEGORIES = 'find_category';

    public const PARENT_CATEGORY = 'find_parent_category';
    public const PARENT_CATEGORIES = 'find_parent_category';

    public const GROUP = 'find_group';
    public const GROUPS = 'find_group';

    public const GROUP_SERIES = 'find_group_series';

    public const SERIES = 'find_series';

    public const YEAR = 'find_year';
    public const MONTH = 'find_month';
    public const DAY = 'find_day';

    public const AUTHOR = 'find_author';
    public const AUTHORS = 'find_author';
    public const BOOK_AUTHOR = 'find_book_author';
    public const PREACHER = 'find_preacher';
    public const PREACHERS = 'find_preacher';

    public const BIBLE_PASSAGE = 'find_passage';

    public const TAG = 'find_tag';
    public const TAGS = 'find_tag';

    public const BOOK = 'find_book';

    public const BOOK_LIST = 'find_booklist';

    public const LOCATION = 'find_location';
    public const GEOGRAPHICAL_LOCATION = 'find_geographical_location';
    public const GEOGRAPHICAL_LOCATION_BY_STATE = 'find_state';
    public const JOB_LOCATION = 'find_job_location';

    public const JOB_ORG = 'find_org';

    public const CHURCH_PASTOR = 'find_pastor';

    public const NEAR_ANOTHER_EVENT = 'find_near';

    public const GALLERY = 'find_gallery';

    public const ME_PAGE_MEMBER_ID = 'findid';

    public const MEMBER_USER_NAME = 'find';

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
            self::BOOK,
            self::BOOK_LIST,
            self::BY_SITE_SLUG,
            self::LOCATION,
            self::NEAR_ANOTHER_EVENT,
            self::GALLERY,
            self::GROUP_SERIES,
        ];
    }
}
