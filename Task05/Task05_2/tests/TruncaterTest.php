<?php

namespace App;

use PHPUnit\Framework\TestCase;

class TruncaterTest extends TestCase
{
    public function testEmpty()
    {
        $truncater = new Truncater();
        $this->assertSame($truncater->truncate(''), '');
    }

    public function testDefaultOptions()
    {
        $truncater = new Truncater();
        $this->assertSame($truncater->truncate('Федосеев Артем Сергеевич'), 'Федосеев Артем Сергеевич');

        $truncater2 = new Truncater(['length' => 10]);
        $this->assertSame($truncater2->truncate('Федосеев Артем Сергеевич'), 'Федосеев А...');
    }

    public function testLessLength()
    {
        $truncater = new Truncater();
        $this->assertSame($truncater->truncate('Федосеев Артем Сергеевич',['length' => 10]), 'Федосеев А...');
    }

    public function testLongerLength()
    {
        $truncater = new Truncater();
        $this->assertSame($truncater->truncate('Федосеев Артем Сергеевич',['length' => 50]), 'Федосеев Артем Сергеевич');
    }

    public function testNegativeLength()
    {
        $truncater = new Truncater();
        $this->assertSame($truncater->truncate('Федосеев Артем Сергеевич',['length' => -10]), 'Федосеев Артем...');
    }

    public function testNewSeparation()
    {
        $truncater = new Truncater();
        $this->assertSame($truncater->truncate('Федосеев Артем Сергеевич',['length' => 10, 'separator' => '*']), 'Федосеев А*');
    }
    public function testNewSeparationAndDefSetting()
    {
        $truncater = new Truncater();
        $this->assertSame($truncater->truncate('Федосеев Артем Сергеевич',['separator' => '*']), 'Федосеев Артем Сергеевич');
    }

    public function testSettingsOverrides()
    {
        $truncater = new Truncater(['length' => 10, 'separator' => ' :)']);
        $this->assertSame($truncater->truncate('Федосеев Артем Сергеевич',) ,'Федосеев А :)');
        $this->assertSame($truncater->truncate('Федосеев Артем Сергеевич', ['length' => 7, 'separator' => '*_*']), 'Федосее*_*');
        $this->assertSame($truncater->truncate('Федосеев Артем Сергеевич',), 'Федосеев А :)');
    }
}