<?php
/**
 * HotlinkUrls
 * 
 * @copyright Copyright 2014 Michael Slone 
 * @license http://opensource.org/licenses/MIT MIT
 */

/**
 * The HotlinkUrls plugin.
 * 
 * @package Omeka\Plugins\HotlinkUrls
 */
class HotlinkUrlsPlugin extends Omeka_Plugin_AbstractPlugin
{
    protected $_filters = array(
        'hotlinkIdentifier' => array('Display', 'Item', 'Dublin Core', 'Identifier'),
        'hotlinkRelation' => array('Display', 'Item', 'Dublin Core', 'Relation'),
    );

    public function hotlinkIdentifier($text, $args) {
        return $this->_hotlinkField($text, $args);
    }

    public function hotlinkRelation($text, $args) {
        return $this->_hotlinkField($text, $args);
    }

    public function _hotlinkField($text, $args) {
        if (preg_replace('/[<>]/', '_', filter_var($text, FILTER_VALIDATE_URL)) === $text) {
            return "<a href=\"" . $text . "\">$text</a>";
        }
        else {
            return $text;
        }
    }
}
