<?php
/**
 * Created by IntelliJ IDEA.
 * User: bdudelsack
 * Date: 09.12.16
 * Time: 11:45
 */

namespace App\Guestbook;


use Zend\Db\Adapter\Adapter;

class GuestbookService
{
    /** @var Adapter */
    protected $db;

    /**
     * GuestbookService constructor.
     * @param Adapter $db
     */
    public function __construct(Adapter $db)
    {
        $this->db = $db;
    }

    /**
     * @return GuestbookEntry[]
     */
    public function fetchAll()
    {
        $entries = [];

        $statement = $this->db->query('SELECT * FROM guestbook');
        $res = $statement->execute();

        foreach ($res as $entry) {
            $entries[] = new GuestbookEntry($entry['id'], $entry['content']);
        }

        return $entries;
    }

    public function insert(GuestbookEntry $entry)
    {
        $statement = $this->db->query('INSERT INTO guestbook(content) VALUES("' . $entry->getContent() . '")');
        $statement->execute();
    }
}