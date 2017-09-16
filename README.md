# HTML Tag

Generates HTML tags.

Can be used to build an HTML tag with a set of attributes, based on some conditions without intertwining a lot of HTML and PHP.

## Instantiation

```php
// <div></div>
new HTMLTag('div');

// <div class="foo"></div>
new HTMLTag('div', 'foo');
```

Second parameter can also be array of attributes:
```php
new HTMLTag('div', [
    'class' => 'foo bar'
]);
```

The array is just `'attribute' => 'value'`, but some attributes have their own syntax:
* `class` - String containing space-separated classes, or array of classes.
* `data` - Associative array.
* `style` - Associative array.

Example:
```php
new HTMLTag('img', [
    'class' => 'foo bar',
    'data' => [
        'id' => 15
    ],
    'style' => [
        'border' => '10px solid red'
    ],
    'src' => 'lorem.jpg',
    'alt' => 'Image'
]);
```

## Printing
```php
$tag = new HTMLTag('div');
$tag->open();

// Print contents of the tag
echo "This will be inside the div";

$tag->close();
```

Or, if there will be no content inside the tag:
```php
$tag->printTag();
```

## Modifying the tag

### Adding attributes
```php
$tag->add('class', 'foo');
$tag->add('data', ['id' => 15]);
$tag->add('src', 'lorem.jpg');
```

### Removing attributes
```php
$tag->remove('style', 'border');
$tag->remove('data', 'id');
$tag->remove('class', 'foo');
```