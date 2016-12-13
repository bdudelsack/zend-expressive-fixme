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

    /** @var string */
    protected $name;

    /** @var string */
    protected $email;

    /**
     * GuestbookEntry constructor.
     * @param $id
     * @param $content
     */
    public function __construct($id, $content, $name, $email)
    {
        $this->id = $id;
        $this->content = $content;
        $this->name = $name;
        $this->email = $email;
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
    /**
     * @return string
     */

    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
}
