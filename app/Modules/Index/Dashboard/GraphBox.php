<?php
/**
 * Copyright (c) 2019. ProVision Media Group Ltd. <http://provision.bg>
 * Venelin Iliev <http://veneliniliev.com>
 */

namespace App\Modules\Index\Dashboard;

use ProVision\Administration\Dashboard\DashboardBox;

class GraphBox extends DashboardBox {

    private $boxBackgroundClass = 'bg-aqua';
    private $iconClass = 'fa-cogs';
    private $title = 'Link box';
    private $value = '90';
    private $link = '#';
    private $linkAttrbutes = [
        'class' => 'small-box-footer',
    ];
    private $linkText = 'More info';

    /**
     * Set box background class.
     *
     * @param $class
     */
    public function setBoxBackgroundClass($class)
    {
        $this->boxBackgroundClass = $class;
    }

    /**
     * Set box icon class (font awesome).
     * @param $class
     */
    public function setIconClass($class)
    {
        $this->iconClass = $class;
    }

    /**
     * Set box title.
     * @param $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Set box count/value.
     *
     * @param $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * Set box bottom link.
     *
     * @param $text
     * @param $url
     * @param array $attributes
     */
    public function setLink($text, $url, $attributes = [])
    {
        $this->link = $url;
        $this->linkText = $text;
        if (is_array($attributes)) {
            $this->linkAttrbutes = array_merge($this->linkAttrbutes, $attributes);
        }
    }

    /**
     * Render box.
     *
     * @return string
     */
    public function render()
    {
        $linkAttributes = '';
        foreach ($this->linkAttrbutes as $attr => $val) {
            $linkAttributes .= ' '.$attr.'="'.$val.'"';
        }

        $boxClass = $this->boxClass;
        $boxBackgroundClass = $this->boxBackgroundClass;
        $iconClass = $this->iconClass;
        $title = $this->title;
        $value = $this->value;
        $link = $this->link;
        $linkText = $this->linkText;

        return view('index::backend.graph', compact('boxClass','boxBackgroundClass', 'linkAttributes','iconClass', 'title', 'value', 'linkText', 'link'));
    }
}