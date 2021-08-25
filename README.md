# Item Helper plugin for Joomla 3

This plugin processes Custom Fields for easier access, and provides additional helper functions when working with
Items (such as Articles and Users).

## Installation

Download the [latest release](https://github.com/mitydigital/joomla-item-helper/releases/latest/download/plg_content_mityitemhelper.zip),
and install it via Joomla's Extensions administrator interface.

### Updates

When installed, this plugin will be updated through Joomla's Extensions update process.

## How to use

The Item Helper library is automatically included for content through Joomla's `onContentPrepare` event. For most cases,
you won't need to do anything else.

You will need to either add the Item Helper's namespace to your code, or use the full namespaced reference:

```php
use Mity;
ItemHelper::getArticleById(123);
ItemHelper::getFieldValue($item, 'my-field');
```

or

```php
\Mity\ItemHelper::getArticleById(123);
\Mity\ItemHelper::getFieldValue($item, 'my-field');
```

### Get an Article by ID

This is a simple shortcut to load an Article for a given ID. This is purely a helper to make it effortless for you to
load an article.

```php
ItemHelper::getArticleById($artice_id);
```

Accepts:

- `$article_id` of the Joomla Content Article to load

Returns:

- a Joomla Article item

### Get Field Value

Get the Value of a given Custom Field for an Item.

```php
ItemHelper::getFieldValue($item, $field);
```

Accepts:

- The `$item` to process
- The `$field` to find - this is the `Name` of your Field.

Returns:

- the field value, if found

### Get Field Label

Get the Label of a given Custom Field for an Item.

```php
ItemHelper::getFieldLabel($item, $field);
```

Accepts:

- The `$item` to process
- The `$field` to find - this is the `Name` of your Field.

Returns:

- the field's label, if found

### Get Field Options

Get the Options of a given Custom Field for an Item.

```php
ItemHelper::getFieldOptions($item, $field);
```

Accepts:

- The `$item` to process
- The `$field` to find - this is the `Name` of your Field.

Returns:

- the field's options, if applicable

### Get Field Group ID

Get the Group ID of a given Custom Field for an item

```php
ItemHelper::getFieldGroupId($item, $field);
```

Accepts:

- The `$item` to process
- The `$field` to find - this is the `Name` of your Field.

Returns:

- the field's Group ID, if applicable

### Truncate

Truncate a string to a given number of characters.

The output string may be longer than the `$numberOfCharacters` because the function is designed to not break words.

```php
ItemHelper::truncate($string, $numberOfCharacters = 160, $includeEllipsis = true);
```

Accepts:

- The `string` to truncate
- The `$numberOfCharacters` to aim for (see note above)
- Boolean `$includeEllipsis` to include "..." or not

Returns:

- the field's Group ID, if applicable

### Process

This is automatically called when interacting with the item.

```php
ItemHelper::process($item);
```

The `process` method `$item` is passed by reference, and will be modified by the Item Helper. Because of this, you do
not need to store the returned variable, which is the modified `$item`.

`com_content.article` and `com_users.user` will automatically be detected. If you are using a different type alias, you
will need to pass this as the second parameter.

```php
ItemHelper::process($item, 'com_customcomponent.typealias');
```

To save processing, when an `$item` has been processed, the processing is skipped on future requests. If you need to
force a re-process, you can pass `true` as the third parameter. If using automatic type alias detection, pass `false` as
the second parameter, or your custom type alias.

```php
ItemHelper::process($item, false, true);
```

### Re-process

You can call `reprocess` as a shortcut to the `process` call above.

```php
ItemHelper::reprocess($item);
```

This will use the default type aliases of `com_content.article` or `com_users.user`, or you can pass your own custom
type alias just like the `process` function.

### Manually including the Item Helper

If you need to include the Item Helper yourself, you can include the library manually:

```php
require_once(JPATH_PLUGINS.'/content/mityitemhelper/ItemHelper.php');
```

You can then use the Item Helper as you normally would.

## License

This addon is licensed under the MIT license.
