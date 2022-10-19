# Tailor Conditions Integration

Integrates Sixgweb Conditions plugin with OctoberCMS Tailor module. Adds Conditions repeater to a new Conditions tab.  Refer to the [Conditions Editor](https://sixgweb.github.io/oc-plugin-documentation/conditions/usage/editor.html) for more information on Conditions.

## Installation
Install via composer
```
composer require sixgweb/conditionstailor-plugin
```

### Blueprint Field
Conditions will only be added to entry records that have a conditions field defined.  See [Blueprints](https://docs.octobercms.com/3.x/cms/tailor/blueprints.html) for more information on defining blueprint fields.

The conditions field must be named conditions and use type conditions.

``` YAML
fields:
    conditions:
        type: conditions

```

After you add the conditions field to the blueprint, press Save and Migrate