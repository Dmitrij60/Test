<?php use App\Tests\ApiGuy;
$I = new ApiGuy($scenario);
$I->wantTo('test API POST error');
$I->sendPOST("/message", ['name' => '', 'email' => '', 'message' => '']);
$I->SeeResponseCodeIs(500, 'server error');
$I->dontSeeResponseCodeIs(200);
$I->seeResponseMatchesJsonType(['success' => 'boolean']);
$I->seeResponseMatchesJsonType(['errors' => 'array']);
$I->seeResponseMatchesJsonType(['errors' => ['name' => 'string', 'email' => 'string', 'message' => 'string']]);
