<?php

/*
 * This file is part of the prestaSitemapPlugin package.
 * (c) David Epely <depely@prestaconcept.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Presta\SitemapBundle\Sitemap\Url;

/**
 * decorated url model
 *
 * @author David Epely
 */
abstract class UrlDecorator implements Url
{
    protected $urlDecorated;
    protected $customNamespaces = array();

    /**
     * @param Url $urlDecorated
     */
    public function __construct(Url $urlDecorated)
    {
        $this->urlDecorated = $urlDecorated;
    }

    /**
     * @return array
     */
    public function getCustomNamespaces()
    {
        return array_merge($this->urlDecorated->getCustomNamespaces(), $this->customNamespaces);
    }
}
