<?php use App\Tests\ApiGuy;
$I = new ApiGuy($scenario);
$I->wantTo('test API GET');
$I->sendGET("/status");
$I->dontSeeResponseCodeIs(404);
$I->seeResponseCodeIs(200);
$I->seeResponseContains('{"status":"OK"}');
$I->seeResponseMatchesJsonType(['status' => 'string']);