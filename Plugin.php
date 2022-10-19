<?php

namespace Sixgweb\ConditionsTailor;

use Event;
use Backend;
use System\Classes\PluginBase;
use Sixgweb\ConditionsTailor\Classes\ConditionableEventHandler;
use Tailor\Models\EntryRecord;

/**
 * Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'ConditionsTailor',
            'description' => 'Conditions Integration for Tailor',
            'author'      => 'Sixgweb',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Boot method, called right before the request route.
     *
     * @return void
     */
    public function boot()
    {
        Event::subscribe(ConditionableEventHandler::class);
        $this->removeConditionsIfNotInBlueprint();
    }

    /**
     * Register contentfield type, which only creates
     * the conditions column in entryrecord table.
     *
     * @return void
     */
    public function registerContentFields()
    {
        return [
            \Sixgweb\ConditionsTailor\ContentFields\ConditionsField::class => 'conditions'
        ];
    }

    /**
     * Events listeners to remove conditioner additions, if no conditions
     * field found in the blueprint structure.
     * 
     * getBlueprintDefinition() is memoized, so fine to recall
     *
     * @return void
     */
    protected function removeConditionsIfNotInBlueprint(): void
    {
        Event::listen('backend.form.extendFields', function ($widget) {
            if ($widget->model instanceof EntryRecord) {
                $blueprints = $widget->model->getBlueprintDefinition();
                if (!array_key_exists('conditions', $blueprints->fields)) {
                    $widget->removeField('conditions');
                }
            }
        });

        Event::listen('backend.list.extendColumns', function ($widget) {
            if ($widget->model instanceof EntryRecord) {
                $blueprints = $widget->model->getBlueprintDefinition();
                if (!array_key_exists('conditions', $blueprints->fields)) {
                    $widget->removeColumn('conditions_count');
                }
            }
        });

        Event::listen('backend.filter.extendScopes', function ($widget) {
            if ($widget->model instanceof EntryRecord) {
                $blueprints = $widget->model->getBlueprintDefinition();
                if (!array_key_exists('conditions', $blueprints->fields)) {
                    foreach ($widget->getScopes() as $scope) {
                        $config = $scope->getConfig();
                        if (isset($config['modelScope']) && $config['modelScope'] == 'meetsConditions') {
                            $widget->removeScope($scope->scopeName);
                        }
                    }
                }
            }
        }, -1);
    }
}
