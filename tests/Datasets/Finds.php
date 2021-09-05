<?php

use Monkdev\MonkCms\Api\Find;

dataset('finds', function () {
        yield [Find::BASIC, '1', 'find_%3A_1'];
        yield [Find::BY_ID, '1', 'find_id_%3A_1'];
        yield [Find::BY_SLUG, 'about-us', 'find_%3A_about-us'];

        yield [Find::BY_SITE_SLUG, 'simple-site', 'find_site_%3A_simple-site'];
        yield [Find::BY_SITE_SLUG, 'Simple Site', 'find_site_%3A_simple-site'];

        yield [Find::CATEGORY, 'love', 'find_category_%3A_love'];
        yield [Find::CATEGORIES, 'love,healing', 'find_category_%3A_love%2Chealing'];
        yield [Find::CATEGORIES, 'love&&healing', 'find_category_%3A_love%26%26healing'];
        yield [Find::CATEGORIES, 'love||healing', 'find_category_%3A_love%7C%7Chealing'];
        yield [Find::CATEGORIES, ['love', 'healing'], 'find_category_%3A_love%2Chealing'];

        yield [Find::PARENT_CATEGORY, 'fruits-of-the-spirit', 'find_parent_category_%3A_fruits-of-the-spirit'];
        yield [Find::PARENT_CATEGORIES, 'fruits-of-the-spirit,special-events', 'find_parent_category_%3A_fruits-of-the-spirit%2Cspecial-events'];
        yield [Find::PARENT_CATEGORIES, 'fruits-of-the-spirit&&special-events', 'find_parent_category_%3A_fruits-of-the-spirit%26%26special-events'];
        yield [Find::PARENT_CATEGORIES, 'fruits-of-the-spirit||special-events', 'find_parent_category_%3A_fruits-of-the-spirit%7C%7Cspecial-events'];
        yield [Find::PARENT_CATEGORIES, ['fruits-of-the-spirit', 'special-events'], 'find_parent_category_%3A_fruits-of-the-spirit%2Cspecial-events'];

        yield [Find::GROUP, 'parents', 'find_group_%3A_parents'];
        yield [Find::GROUPS, 'parents,singles', 'find_group_%3A_parents%2Csingles'];
        yield [Find::GROUPS, 'parents&&singles', 'find_group_%3A_parents%26%26singles'];
        yield [Find::GROUPS, 'parents||singles', 'find_group_%3A_parents%7C%7Csingles'];

        yield [Find::GROUP_SERIES, 'staff', 'find_group_series_%3A_staff'];
        yield [Find::GROUP_SERIES, 'School Administrators', 'find_group_series_%3A_school-administrators'];

        yield [Find::SERIES, 'current,special-guests', 'find_series_%3A_current%2Cspecial-guests'];
        yield [Find::SERIES, 'current&&special-guests', 'find_series_%3A_current%26%26special-guests'];
        yield [Find::SERIES, 'current||special-guests', 'find_series_%3A_current%7C%7Cspecial-guests'];

        yield [Find::YEAR, '2020', 'find_year_%3A_2020'];
        yield [Find::MONTH, '11-2020', 'find_month_%3A_11-2020'];
        yield [Find::DAY, '2020-11-05', 'find_day_%3A_2020-11-05'];
        yield [Find::DAY, 'Monday', 'find_day_%3A_Monday'];

        yield [Find::AUTHOR, 'frank-de-monk', 'find_author_%3A_frank-de-monk'];
        yield [Find::AUTHOR, 'Frank De Monk', 'find_author_%3A_frank-de-monk'];
        yield [Find::AUTHORS, 'frank-de-monk,monkbot', 'find_author_%3A_frank-de-monk%2Cmonkbot'];
        yield [Find::BOOK_AUTHOR, 'Frank De Monk', 'find_author_%3A_Frank+De+Monk'];
        yield [Find::PREACHER, 'frank-de-monk', 'find_preacher_%3A_frank-de-monk'];
        yield [Find::PREACHER, 'Frank De Monk', 'find_preacher_%3A_frank-de-monk'];
        yield [Find::PREACHERS, 'frank-de-monk,monkbot', 'find_preacher_%3A_frank-de-monk%2Cmonkbot'];

        yield [Find::BIBLE_PASSAGE, 'Romans', 'find_passage_%3A_Romans'];
        yield [Find::BIBLE_PASSAGE, '1-Corinthians', 'find_passage_%3A_1-Corinthians'];
        yield [Find::BIBLE_PASSAGE, '1 Corinthians 5:1-6:13', 'find_passage_%3A_1+Corinthians+5%3A1-6%3A13'];

        yield [Find::TAG, 'jesus', 'find_tag_%3A_jesus'];
        yield [Find::TAG, 'Love your neighbor!', 'find_tag_%3A_love-your-neighbor'];
        yield [Find::TAGS, 'Special Events, United Methodist Church', 'find_tag_%3A_special-events%2Cunited-methodist-church'];

        yield [Find::BOOK_LIST, 'Recommended Reading!', 'find_booklist_%3A_recommended-reading'];
        yield [Find::BOOK_LIST, 'recommended-reading', 'find_booklist_%3A_recommended-reading'];

        yield [Find::BOOK, "Oh the Places You'll Go", 'find_book_%3A_oh-the-places-youll-go'];
        yield [Find::BOOK, "oh-the-places-youll-go", 'find_book_%3A_oh-the-places-youll-go'];

        yield [Find::LOCATION, 'The Sanctuary', 'find_location_%3A_the-sanctuary'];
        yield [Find::LOCATION, 'the-sanctuary', 'find_location_%3A_the-sanctuary'];

        yield [Find::GEOGRAPHICAL_LOCATION, 'Saint Louis', 'find_location_%3A_Saint+Louis'];
        yield [Find::GEOGRAPHICAL_LOCATION, '63104', 'find_location_%3A_63104'];
        yield [Find::GEOGRAPHICAL_LOCATION, 'US|MO|Saint Louis', 'find_location_%3A_US%7CMO%7CSaint+Louis'];

        yield [Find::GEOGRAPHICAL_LOCATION_BY_STATE, 'MO', 'find_state_%3A_MO'];

        yield [Find::JOB_LOCATION, 'Ministry Brands', 'find_location_%3A_Ministry+Brands'];
        yield [Find::JOB_LOCATION, 'ministry-brands', 'find_location_%3A_ministry-brands'];

        yield [Find::JOB_ORG, 'Ministry Brands', 'find_org_%3A_Ministry+Brands'];
        yield [Find::JOB_ORG, 'ministry-brands', 'find_org_%3A_ministry-brands'];

        yield [Find::NEAR_ANOTHER_EVENT, 'Meet The Pastor', 'find_near_%3A_meet-the-pastor'];
        yield [Find::NEAR_ANOTHER_EVENT, 'meet-the-pastor', 'find_near_%3A_meet-the-pastor'];

        yield [Find::CHURCH_PASTOR, 'Frank De Monk', 'find_pastor_%3A_Frank+De+Monk'];

        yield [Find::GALLERY, 'Baptism Sunday', 'find_gallery_%3A_baptism-sunday'];
        yield [Find::GALLERY, 'baptism-sunday', 'find_gallery_%3A_baptism-sunday'];

        yield [Find::ME_PAGE_MEMBER_ID, '1234', 'findid_%3A_1234'];
        yield [Find::MEMBER_USER_NAME, 'fmonk04', 'find_%3A_fmonk04'];

        yield [Find::PERFORMANCE, '12345', 'find_performance_%3A_12345'];
        yield [Find::SONG, 'Amazing Grace', 'find_song_%3A_amazing-grace'];
        yield [Find::SONG, 'amazing-grace', 'find_song_%3A_amazing-grace'];
        yield [Find::COMPOSER, 'Roxanna Panufnik', 'find_composer_%3A_roxanna-panufnik'];
        yield [Find::COMPOSER, 'roxanna-panufnik', 'find_composer_%3A_roxanna-panufnik'];
        yield [Find::PERFORMER, 'James Cleveland', 'find_performer_%3A_james-cleveland'];
        yield [Find::PERFORMER, 'james-cleveland', 'find_performer_%3A_james-cleveland'];

        yield [Find::SKU_TYPE, 'Camp Clothes', 'find_skutype_%3A_camp-clothes'];
        yield [Find::SKU_TYPE, 'camp-clothes', 'find_skutype_%3A_camp-clothes'];
        yield [Find::SIMILAR_PRODUCTS, 'Camp Clothes', 'find_similar_%3A_camp-clothes'];
        yield [Find::SIMILAR_PRODUCTS, 'camp-clothes', 'find_similar_%3A_camp-clothes'];

        yield [Find::MODULE, 'Sermons', 'find_module_%3A_sermons'];
        yield [Find::MODULE, 'sermons', 'find_module_%3A_sermons'];
        yield [Find::MODULE, 'Sermons, Events', 'find_module_%3A_sermons%2Cevents'];
        yield [Find::MODULE, 'sermons,events', 'find_module_%3A_sermons%2Cevents'];

        yield [Find::FREQUENCY, 'Weekly', 'find_frequency_%3A_weekly'];
        yield [Find::FREQUENCY, 'weekly', 'find_frequency_%3A_weekly'];
        yield [Find::FREQUENCY, 'Weekly, Bi Weekly', 'find_frequency_%3A_weekly%2Cbi-weekly'];
        yield [Find::FREQUENCY, 'weekly,bi-weekly', 'find_frequency_%3A_weekly%2Cbi-weekly'];

        yield [Find::FACEBOOK_PAGE_ID, '101090861674291', 'find_page_id_%3A_101090861674291'];
        yield [Find::FACEBOOK_POST_ID, '101090861674291_101098335006877', 'find_post_id_%3A_101090861674291_101098335006877'];

        yield [Find::INSTAGRAM_ACCOUNT_ID, '101090861674291', 'find_account_id_%3A_101090861674291'];
        yield [Find::INSTAGRAM_MEDIA_ID, '57863548765', 'find_media_id_%3A_57863548765'];
});
