<?php

namespace PhpCollectionJson;

use PhpCollectionJson\Groups\ItemGroup;
use PhpCollectionJson\Groups\LinkGroup;
use PhpCollectionJson\Groups\QueryGroup;

class Collection implements \JsonSerializable
{
    private $version;
    private $href;
    private $links;
    private $items;
    private $queries;
    private $template;
    private $error;
    private $paging;

    /**
     * Collection constructor.
     * @param string $href
     */
    public function __construct($href)
    {
        $this->version = '1.0';
        $this->href = $href;
        $this->links = new LinkGroup();
        $this->items = new ItemGroup();
        $this->queries = new QueryGroup();
        $this->template = null;
        $this->error = null;
        $this->paging = null;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param string $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * @return string
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @param string $href
     */
    public function setHref($href)
    {
        $this->href = $href;
    }

    /**
     * @return LinkGroup
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * @return ItemGroup
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param Error $error
     */
    public function setError(Error $error)
    {
        $this->error = $error;
    }

    /**
     *
     */
    public function removeError()
    {
        $this->error = null;
    }

    /**
     * @param Template $template
     */
    public function setTemplate(Template $template)
    {
        $this->template = $template;
    }

    /**
     *
     */
    public function removeTemplate()
    {
        $this->template = null;
    }

    /**
     * @return QueryGroup
     */
    public function getQueries()
    {
        return $this->queries;
    }

    /**
     * @param Paging $paging
     */
    public function setPaging(Paging $paging)
    {
        $this->paging = $paging;
    }

    /**
     *
     */
    public function removePaging()
    {
        $this->paging = null;
    }

    public function jsonSerialize()
    {
        $object = new \stdClass();
        $object->version = $this->version;
        $object->href = $this->href;

        if ($this->links->count() > 0) {
            $object->links = $this->links;
        }

        if ($this->items->count() > 0) {
            $object->items = $this->items;
        }

        if ($this->queries->count() > 0) {
            $object->queries = $this->queries;
        }

        if (!is_null($this->template)) {
            $object->template = $this->template;
        }

        if (!is_null($this->error)) {
            $object->error = $this->error;
        }

        if (!is_null($this->paging)) {
            $object->paging = $this->paging;
        }

        return $object;
    }

    public function __toString()
    {
        return json_encode($this);
    }
}
