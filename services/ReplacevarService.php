<?php
/**
 * replacevar plugin for Craft CMS
 *
 * Replacevar Service
 *
 *
 * @author    Nathan Reed
 * @copyright Copyright (c) 2017 Nathan Reed
 * @link      https://github.com/zizther
 * @package   Replacevar
 * @since     1.0.0
 */

namespace Craft;

class ReplacevarService extends BaseApplicationComponent
{
    /**
     * This function can literally be anything you want, and you can have as many service functions as you want
     *
     * From any other plugin file, call it like this:
     *
     *     craft()->replacevar->replaceVar()
     */

    // Set the globals variable
    protected $globals = null;

    public function replaceVar($string)
    {
        $string = craft()->config->parseEnvironmentString($string);
        $string = $this->parseGlobals($string);

        return $string;
    }

    public function parseGlobals($string)
    {
        foreach ($this->getGlobals() as $key => $value)
        {
            $string = str_replace('{'.$key.'}', $value, $string);
        }

        return $string;
    }

    protected function getGlobals()
    {
        if ($this->globals !== null)
        {
            return $this->globals;
        }

        $this->globals = array();

        foreach (craft()->globals->getAllSets() as $globalSet)
        {
            foreach ($globalSet->getFieldLayout()->getFields() as $fieldLayoutField)
            {
                $field = $fieldLayoutField->getField();
                $fieldType = $field->getFieldType();

                if (
                    $fieldType instanceof PlainTextFieldType ||
                    $fieldType instanceof RichTextFieldType
                ) {
                    $value = $globalSet->getFieldValue($field->handle);
                    $key = $globalSet->handle.'.'.$field->handle;

                    $this->globals[$key] = (string)$value;
                }
            }
        }

        return $this->globals;
    }

}
