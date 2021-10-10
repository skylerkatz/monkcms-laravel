<?php

declare(strict_types=1);

use Monkdev\MonkCms\Api\Hide;

dataset('hides', function () {
    yield [Hide::GROUP, 'parents', 'hide_group_%3A_parents'];
    yield [Hide::GROUPS, 'parents,singles', 'hide_group_%3A_parents%2Csingles'];
    yield [Hide::GROUPS, 'parents&&singles', 'hide_group_%3A_parents%26%26singles'];
    yield [Hide::GROUPS, 'parents||singles', 'hide_group_%3A_parents%7C%7Csingles'];
    yield [Hide::PRIVATE_GROUPS, 'yes', 'hide_private_%3A_yes'];
    yield [Hide::PRIVATE_GROUPS, 'no', 'hide_private_%3A_no'];

    yield [Hide::SERIES, 'current,special-guests', 'hide_series_%3A_current%2Cspecial-guests'];
    yield [Hide::SERIES, 'current&&special-guests', 'hide_series_%3A_current%26%26special-guests'];
    yield [Hide::SERIES, 'current||special-guests', 'hide_series_%3A_current%7C%7Cspecial-guests'];

    yield [Hide::CATEGORY, 'love', 'hide_category_%3A_love'];
    yield [Hide::CATEGORIES, 'love,healing', 'hide_category_%3A_love%2Chealing'];
    yield [Hide::CATEGORIES, 'love&&healing', 'hide_category_%3A_love%26%26healing'];
    yield [Hide::CATEGORIES, 'love||healing', 'hide_category_%3A_love%7C%7Chealing'];
    yield [Hide::CATEGORIES, ['love', 'healing'], 'hide_category_%3A_love%2Chealing'];

    yield [Hide::DATE, 'future', 'hide_date_%3A_future'];
    yield [Hide::DATE, 'past', 'hide_date_%3A_past'];

    yield [Hide::FREQUENCY, 'Weekly', 'hide_frequency_%3A_weekly'];
    yield [Hide::FREQUENCY, 'weekly', 'hide_frequency_%3A_weekly'];
    yield [Hide::FREQUENCY, 'Weekly, Bi Weekly', 'hide_frequency_%3A_weekly%2Cbi-weekly'];
    yield [Hide::FREQUENCY, 'weekly,bi-weekly', 'hide_frequency_%3A_weekly%2Cbi-weekly'];

    yield [Hide::MODULE, 'Sermons', 'hide_module_%3A_sermons'];
    yield [Hide::MODULE, 'sermons', 'hide_module_%3A_sermons'];
    yield [Hide::MODULE, 'Sermons, Events', 'hide_module_%3A_sermons%2Cevents'];
    yield [Hide::MODULE, 'sermons,events', 'hide_module_%3A_sermons%2Cevents'];

    yield [Hide::SMALL_GROUP_STATUS, 'open', 'hide_status_%3A_open'];
    yield [Hide::SMALL_GROUP_STATUS, 'Open', 'hide_status_%3A_open'];
    yield [Hide::SMALL_GROUP_STATUS, 'closed', 'hide_status_%3A_closed'];
    yield [Hide::SMALL_GROUP_STATUS, 'Closed', 'hide_status_%3A_closed'];
    yield [Hide::SMALL_GROUP_STATUS, 'full', 'hide_status_%3A_full'];
    yield [Hide::SMALL_GROUP_STATUS, 'Full', 'hide_status_%3A_full'];

    yield [Hide::TAG, 'jesus', 'hide_tag_%3A_jesus'];
    yield [Hide::TAG, 'Love your neighbor!', 'hide_tag_%3A_love-your-neighbor'];
    yield [Hide::TAGS, 'Special Events, United Methodist Church', 'hide_tag_%3A_special-events%2Cunited-methodist-church'];
});
