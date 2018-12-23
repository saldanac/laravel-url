<?php

namespace Zbiller\Url\Options;

use Exception;

class SlugOptions
{
    /**
     * The field used to generate the slug from.
     *
     * @var string
     */
    private $fromField;

    /**
     * The field where to store the generated slug.
     *
     * @var string
     */
    private $toField;

    /**
     * Flag whether slugs should be unique or not.
     *
     * @var bool
     */
    private $uniqueSlugs = true;

    /**
     * The separator used between words in the slug.
     *
     * @var string
     */
    private $slugSeparator = '-';

    /**
     * The language used to transform the UTF-8 slug to ASCII.
     *
     * @var string
     */
    private $slugLanguage = 'en';

    /**
     * Flag whether to generate slug on model create event or not.
     *
     * @var bool
     */
    private $generateSlugOnCreate = true;

    /**
     * Flag whether to generate slug on model update event or not.
     *
     * @var bool
     */
    private $generateSlugOnUpdate = true;

    /**
     * Get the value of a property of this class.
     *
     * @param $name
     * @return mixed
     * @throws Exception
     */
    public function __get($name)
    {
        if (property_exists(static::class, $name)) {
            return $this->{$name};
        }

        throw new Exception(
            'The property "' . $name . '" does not exist in class "' . static::class . '"'
        );
    }

    /**
     * Get a fresh instance of this class.
     *
     * @return SlugOptions
     */
    public static function instance(): SlugOptions
    {
        return new static();
    }

    /**
     * Set the $fromField to work with in the Zbiller\Url\Traits\HasSlug trait.
     *
     * @param string|array|callable $field
     * @return SlugOptions
     */
    public function generateSlugFrom($field): SlugOptions
    {
        if (is_string($field)) {
            $field = [$field];
        }

        $this->fromField = $field;

        return $this;
    }

    /**
     * Set the $toField to work with in the Zbiller\Url\Traits\HasSlug trait.
     *
     * @param string $field
     * @return SlugOptions
     */
    public function saveSlugTo($field): SlugOptions
    {
        $this->toField = $field;

        return $this;
    }

    /**
     * Set the $uniqueSlugs to work with in the Zbiller\Url\Traits\HasSlug trait.
     *
     * @return SlugOptions
     */
    public function allowDuplicateSlugs(): SlugOptions
    {
        $this->uniqueSlugs = false;

        return $this;
    }

    /**
     * Set the $slugSeparator to work with in the Zbiller\Url\Traits\HasSlug trait.
     *
     * @param string $separator
     * @return SlugOptions
     */
    public function usingSeparator($separator): SlugOptions
    {
        $this->slugSeparator = $separator;

        return $this;
    }

    /**
     * Set the $slugLanguage to work with in the Zbiller\Url\Traits\HasSlug trait.
     *
     * @param string $separator
     * @return SlugOptions
     */
    public function usingLanguage($separator): SlugOptions
    {
        $this->slugLanguage = $separator;

        return $this;
    }

    /**
     * Set the $generateSlugOnCreate to work with in the Zbiller\Url\Traits\HasSlug trait.
     *
     * @return SlugOptions
     */
    public function doNotGenerateSlugOnCreate(): SlugOptions
    {
        $this->generateSlugOnCreate = false;

        return $this;
    }

    /**
     * Set the $generateSlugOnUpdate to work with in the Zbiller\Url\Traits\HasSlug trait.
     *
     * @return SlugOptions
     */
    public function doNotGenerateSlugOnUpdate(): SlugOptions
    {
        $this->generateSlugOnUpdate = false;

        return $this;
    }
}