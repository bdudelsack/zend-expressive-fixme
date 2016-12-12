<?php
/**
 * Created by IntelliJ IDEA.
 * User: bdudelsack
 * Date: 09.12.16
 * Time: 11:48
 */

namespace App\Guestbook;


class GuestbookEntry
{
    /** @var int */
    protected $id;

    /** @var string */
    protected $content;

    /**
     * GuestbookEntry constructor.
     * @param $id
     * @param $content
     */
    public function __construct($id, $content)
    {
        $this->id = $id;
        $this->content = $content;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }
}