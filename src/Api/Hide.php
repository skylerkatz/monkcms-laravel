<?php

namespace Monkdev\MonkCms\Api;

class Hide
{
    public const CATEGORY = 'hide_category';
    public const CATEGORIES = 'hide_category';
    public const GROUP = 'hide_group';
    public const GROUPS = 'hide_group';

    /**
     * Only used for events with display:group
     */
    public const PRIVATE_GROUPS = 'hide_private';

    public const SERIES = 'hide_series';

    public const DATE = 'hide_date';
    public const TAG = 'hide_tag';
    public const TAGS = 'hide_tag';
    public const MODULE = 'hide_module';
    public const FREQUENCY = 'hide_frequency';

    public const SMALL_GROUP_STATUS = 'hide_status';

    /**
     * Hide params that need to have slugged params.
     *
     * @return array<int, string>
     */
    public static function sluggableHides(): array
    {
        return [
            self::TAG,
            self::TAGS,
            self::MODULE,
            self::FREQUENCY,
            self::SMALL_GROUP_STATUS,
        ];
    }
}
