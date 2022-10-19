<?php

namespace Sixgweb\ConditionsTailor\Classes;

use Sixgweb\Conditions\Classes\AbstractConditionableEventHandler;

class ConditionableEventHandler extends AbstractConditionableEventHandler
{

    protected function getModelClass(): string
    {
        return \Tailor\Models\EntryRecord::class;
    }

    protected function getTab(): ?string
    {
        return 'Conditions';
    }

    protected function getLabel(): ?string
    {
        return null;
    }

    protected function getComment(): ?string
    {
        return null;
    }
}
