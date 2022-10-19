<?php

namespace Sixgweb\ConditionsTailor\ContentFields;

use Tailor\Classes\ContentFieldBase;
use October\Contracts\Element\FormElement;
use October\Contracts\Element\ListElement;
use October\Contracts\Element\FilterElement;

class ConditionsField extends ContentFieldBase
{
    /**
     * defineConfig will process the field configuration.
     */
    public function defineConfig(array $config)
    {
    }

    /**
     * defineFormField will define how a field is displayed in a form.
     */
    public function defineFormField(FormElement $form, $context = null)
    {
        // ...
    }

    /**
     * defineListColumn will define how a field is displayed in a list.
     */
    public function defineListColumn(ListElement $list, $context = null)
    {
        // ...
    }

    /**
     * defineFilterScope will define how a field is displayed in a filter.
     */
    public function defineFilterScope(FilterElement $filter, $context = null)
    {
        // ...
    }

    /**
     * extendModelObject will extend the record model.
     */
    public function extendModelObject($model)
    {
        // ...
    }

    /**
     * extendDatabaseTable adds any required columns to the database.
     */
    public function extendDatabaseTable($table)
    {
        $table->json('conditions')->nullable();
    }
}
