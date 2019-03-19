<?php
use App\Tests\AcceptanceTester;
$I = new AcceptanceTester($scenario);
$I->wantTo('test form');
$I->amOnPage('http://127.0.0.1:8000/default');
$I->fillField('Name', 'Dmitij');
$I->fillField('Email','dmitrij.buckov@yandex.ru');
$I->fillField('Message','Hello');
$I->click('message[send]');
$I->see('Success!');


