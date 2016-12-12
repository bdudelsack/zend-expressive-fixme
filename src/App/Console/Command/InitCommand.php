<?php
/**
 * Created by IntelliJ IDEA.
 * User: bdudelsack
 * Date: 09.12.16
 * Time: 11:29
 */

namespace App\Console\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Zend\Db\Adapter\Adapter;

class InitCommand extends Command
{
    /** @var Adapter */
    protected $db;

    public function __construct(Adapter $db)
    {
        $this->db = $db;
        parent::__construct();
    }


    protected function configure()
    {
        $this->setName('init')
            ->setDescription('Initalizes the application');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $stmt = $this->db->query('CREATE TABLE IF NOT EXISTS guestbook (id INTEGER PRIMARY KEY AUTOINCREMENT, content VARCHAR)');
        $stmt->execute();
    }
}