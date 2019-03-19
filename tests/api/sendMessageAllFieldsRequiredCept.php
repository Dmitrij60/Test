<?php use App\Tests\ApiGuy;
$I = new ApiGuy($scenario);
$I->wantTo('test API POST');
$I->sendPOST("/message", ['name' => 'Dmitrij', 'email' => 'dmitrij.buckov@yandex.ru', 'message' => 'Hello']);
$I->dontSeeResponseCodeIs(500, 'server error');
$I->SeeResponseCodeIs(200);
$I->seeResponseMatchesJsonType(['success' => 'boolean']);
$I->seeResponseContainsJson(['success' => true]);


