<?php

/**
 *
 *  Bad Words Bad
 *
 *  BWB is a small library for handling profanity words.
 *
 *  @author     Sebi Popa <hello@sebipopa.com>
 *  @version    1.0 (last revision: October 21, 2013)
 *  @copyright  (c) 2013 Sebi Popa
 *  @package    BWB
 */

class BWB {

    private $language;

    private $path;

    function __construct()
    {

        $this->path = preg_replace('/\\\/', '/', dirname(__FILE__));

        $this->language('romanian');

    }

    /**
     * Sets the current language
     * @param string $language
     */
    function language($language)
    {

        $this->language = $language;

    }

    /**
     * Fetches the word list from the language file
     *
     * @return string
     */
    private function get_word_list()
    {

        // Check for file
        if (!file_exists($this->path . '/languages/' . $this->language . '.txt')) {
            trigger_error('The language file was not found.', E_USER_ERROR);
        }

        // Get the list of words
        return file_get_contents($this->path . '/languages/' . $this->language . '.txt');

    }

    /**
     * Checks if a given string contains profanity words
     * @param string $input
     * @return boolean
     */
    function has_bad_words($input)
    {

        // Get word list
        $word_list = $this->get_word_list();

        // Quote regex characters
        if (function_exists('preg_quote')) {
            $filterRegex = preg_quote($word_list);
        }

        // Prepare string for preg_match
        $filterRegex = '/(' . preg_replace('/\n/', '|', $filterRegex) . ')/i';

        // Return the result
        return (bool)preg_match($filterRegex, $input);

    }

}