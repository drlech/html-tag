<?php

class HTMLTag
{

    /**
     * Name of the HTML tag.
     *
     * @var string
     */
    private $tag;

    /**
     * Associative array of HTML attributes.
     *
     * @var array
     */
    private $attributes = [];

    /**
     * Contents of the "style" attribute, as associative array.
     *
     * @var array
     */
    private $styles = [];

    /**
     * Associative array of data-* tags.
     *
     * @var array
     */
    private $data = [];

    /**
     * Elements that have no closing tag.
     *
     * @var array
     */
    private static $voidElements = [
        'area',
        'base',
        'br',
        'col',
        'command',
        'embed',
        'hr',
        'img',
        'input',
        'keygen',
        'link',
        'meta',
        'param',
        'source',
        'track',
        'wbr'
    ];

    /**
     * Some HTML tags don't make sense if particular attribute is not present.
     * This is not based on validity according to HTML5 specification, but an attempt
     * to avoid common mistakes and omissions.
     *
     * @var array
     */
    private static $requiredAttributes = [
        'a'      => 'href',
        'embed'  => 'src',
        'img'    => 'src',
        'iframe' => 'src',
        'input'  => 'type',
        'source' => 'src'
    ];

    /**
     * HTMLTag constructor.
     *
     * @param string $tag        Tag name.
     * @param array  $attributes Associative array of attributes.
     * @param array  $styles     Contents of the "style" attribute.
     */
    public function __construct($tag, $attributes = [], $styles = [])
    {
        $this->tag        = $tag;
        $this->attributes = $attributes;
        $this->styles     = $styles;

        if (is_string($this->attributes)) {
            $this->attributes = ['class' => $this->attributes];
        }

        if (isset($this->attributes['styles'])) {
            $this->styles = $styles + $this->attributes['styles'];
            unset($this->attributes['styles']);
        }

        if (isset($this->attributes['data'])) {
            $this->data = $this->attributes['data'];
            unset($this->attributes['data']);
        }
    }

    /**
     * Print the opening tag.
     */
    public function open()
    {
        if (
            array_key_exists($this->tag, self::$requiredAttributes) &&
            ! array_key_exists(self::$requiredAttributes[$this->tag], $this->attributes)
        ) {
            $requiredAttribute = self::$requiredAttributes[$this->tag];
            throw new LogicException("\"$this->tag\" is missing a required attribute: \"$requiredAttribute\"");
        }

        echo "<$this->tag";
        $this->printAttributes();

        if ($this->isVoid()) {
            echo '/';
        }

        echo '>';
    }

    /**
     * Print the closing tag.
     *
     * @throws LogicException When trying to close a void tag.
     */
    public function close()
    {
        if ($this->isVoid()) {
            throw new LogicException("\"$this->tag\" does't have a closing tag.");
        }

        echo "</$this->tag>";
    }

    /**
     * Prints the tag.
     * If the tag is not void the closing tag will be printed immediately after the opening tag,
     * thus preventing from adding any content in the middle.
     */
    public function printTag()
    {
        $this->open();

        if ( ! $this->isVoid()) {
            $this->close();
        }
    }

    /**
     * Add attributes or styles.
     *
     * @param array|string $attribute Name of the attribute, or array of attributes to add.
     * @param bool         $value     Value of attribute to add, if $attribute is a string.
     */
    public function add($attribute, $value = false)
    {
        if (is_array($attribute)) {
            foreach ($attribute as $name => $attributeValue) {
                $this->addAttribute($name, $attributeValue);
            }

            return;
        }

        if ( ! $value) {
            return;
        }

        $this->addAttribute($attribute, $value);
    }

    /**
     * Add a single attribute. The attribute name can also be "style" or "data", in which case
     * the value should be an array of styles or data-* attributes, respectively.
     *
     * @param string $attribute Name of the attribute to add.
     * @param mixed  $value     Value of the attribute.
     */
    private function addAttribute($attribute, $value)
    {
        if ('style' === $attribute) {
            $this->addStyle($value);

            return;
        }

        if ('data' === $attribute) {
            $this->addData($value);

            return;
        }

        $this->attributes[$attribute] = $value;
    }

    /**
     * Add style or array of styles.
     *
     * @param string|array $style CSS property, or array of styles.
     * @param bool         $value CSS value, if $style is a string.
     */
    public function addStyle($style, $value = false)
    {
        if (is_array($style)) {
            $this->styles = array_merge($this->styles, $style);

            return;
        }

        if ( ! $value) {
            return;
        }

        $this->styles[$style] = $value;
    }

    /**
     * Add single data-* attribute, or array of data-* attributes.
     *
     * @param string|array $data  data-* attribute name, or array of data-* attributes.
     * @param bool         $value data-* attribute value, if $data is a string.
     */
    public function addData($data, $value = false)
    {
        if (is_array($data)) {
            $this->data = array_merge($this->data, $data);

            return;
        }

        if ( ! $value) {
            return;
        }

        $this->data[$data] = $value;
    }

    /**
     * Check if this tag is void (does not have closing tag).
     *
     * @return bool
     */
    public function isVoid()
    {
        return in_array($this->tag, self::$voidElements);
    }

    /**
     * Print HTML attributes associated with this HTML tag.
     */
    private function printAttributes()
    {
        $this->printCommonAttributes();
        $this->printData();
        $this->printStyles();
    }

    /**
     * Print all attributes except data-* and style.
     */
    private function printCommonAttributes()
    {
        foreach ($this->attributes as $name => $value) {
            if (is_array($value)) {
                $value = implode(' ', $value);
            }

            echo " $name=\"$value\"";
        }
    }

    /**
     * Print all data-* attributes.
     */
    private function printData()
    {
        foreach ($this->data as $name => $value) {
            echo " data-$name=\"$value\"";
        }
    }

    /**
     * Print all inline styles.
     */
    private function printStyles()
    {
        if (empty($this->styles)) {
            return;
        }

        $styles = '';
        foreach ($this->styles as $style => $value) {
            $styles .= "$style: $value;";
        }

        echo " style=\"$styles\"";
    }
}