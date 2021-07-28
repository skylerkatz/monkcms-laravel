<?php /** @noinspection PhpUnhandledExceptionInspection */

use Illuminate\Support\Facades\Http;
use Monkdev\MonkCms\Api\QueryBuilder;
use Illuminate\Support\Facades\Config;
use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpFoundation\Response;
use Monkdev\MonkCms\Exceptions\SiteNotFoundException;
use Monkdev\MonkCms\Exceptions\UnprocessableApiResponseException;

it('can build a proper query string', function () {
    $expectedQueryString = http_build_query([
        'SITEID' => '54321',
        'CMSCODE' => 'EKK',
        'CMSTYPE' => 'CMS',
        'NR' => 3,
        'arg0' => 'sermon',
        'arg1' => 'display_:_list',
        'arg2' => 'json',
    ]);

    $queryBuilder = new QueryBuilder();
    $queryBuilder->module('sermon');
    $queryBuilder->display('list');

    expect(invokeProtected($queryBuilder, 'buildQueryString'))->toBe($expectedQueryString);
});

it('can generate a full api url', function () {
    $queryBuilder = new QueryBuilder();
    $queryBuilder->module('sermon');
    $queryBuilder->display('list');

    Config::set('monkcms.api_url', 'https://monkcms.api');

    $expectedUrl = sprintf(
        "https://monkcms.api/Clients/ekkContent.php?%s",
        invokeProtected($queryBuilder, 'buildQueryString')
    );

    expect(invokeProtected($queryBuilder, 'buildRequestUrl'))->toBe($expectedUrl);
});

it('can make a request using basic auth', function () {
    Http::fake([
        '*' => Http::response('         1{"show":{"title":"Church of Monk"}}'),
    ]);

    $queryBuilder = new QueryBuilder();
    $queryBuilder->module('sermon');
    $queryBuilder->display('list');

    expect(invokeProtected($queryBuilder, 'makeRequest'))
        ->toStartWith('         1');
});

it('throws an authentication exception if the site id is missing', function () {
    Config::set('monkcms.site_id', '');

    $queryBuilder = new QueryBuilder();
    $queryBuilder->module('sermon');
    $queryBuilder->display('list');
    invokeProtected($queryBuilder, 'makeRequest');
})->throws(AuthenticationException::class);

it('throws an authentication exception if the site secret is missing', function () {
    Config::set('monkcms.site_secret', '');

    $queryBuilder = new QueryBuilder();
    $queryBuilder->module('sermon');
    $queryBuilder->display('list');
    invokeProtected($queryBuilder, 'makeRequest');
})->throws(AuthenticationException::class);

it('throws an authentication exception if the site secret is incorrect', function () {
    Http::fake([
        '*' => Http::response('', Response::HTTP_UNAUTHORIZED),
    ]);

    Config::set('monkcms.site_secret', 'incorrect-site-secret');
    $queryBuilder = new QueryBuilder();
    $queryBuilder->module('sermon');
    $queryBuilder->display('list');
    invokeProtected($queryBuilder, 'makeRequest');
})->throws(AuthenticationException::class);

it('throws an exception if the site does not exist', function () {
    Http::fake([
        '*' => Http::response('', Response::HTTP_NOT_FOUND),
    ]);

    Config::set('monkcms.site_id', 'not-a-real-site-id');

    $queryBuilder = new QueryBuilder();
    $queryBuilder->module('sermon');
    $queryBuilder->display('list');
    invokeProtected($queryBuilder, 'makeRequest');
})->throws(
    SiteNotFoundException::class,
    'The site with an id of \'not-a-real-site-id\' does not exist'
);

it('can properly decode the json body', function () {
    Http::fake([
        '*' => Http::response('         1{"show":{"title":"Church of Monk"}}'),
    ]);

    $queryBuilder = new QueryBuilder();
    $queryBuilder->module('sermon');
    $queryBuilder->display('list');

    expect(invokeProtected($queryBuilder, 'processResponse', [invokeProtected($queryBuilder, 'makeRequest')]))
        ->toBeArray();
});

it('throws an exception if the response is bad', function () {
    Http::fake([
        '*' => Http::response('0'),
    ]);

    $queryBuilder = new QueryBuilder();
    $queryBuilder->module('sermon');
    $queryBuilder->display('list');

    invokeProtected($queryBuilder, 'processResponse', [invokeProtected($queryBuilder, 'makeRequest')]);
})->throws(
    UnprocessableApiResponseException::class,
    'The api response was unable to be processed: 0'
);
