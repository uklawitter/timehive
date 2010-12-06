<?php

class timeboxxCheckmissingbookingsTask extends sfBaseTask
{

    protected function configure()
    {
        // // add your own arguments here
        // $this->addArguments(array(
        //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
        // ));

        $this->addOptions(array(
            new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name'),
            new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
            new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'doctrine'),
                // add your own options here
        ));

        $this->namespace = 'timeboxx';
        $this->name = 'check-missing-bookings';
        $this->briefDescription = '';
        $this->detailedDescription = <<<EOF
The [timeboxx:check-missing-bookings|INFO] task does things.
Call it with:

  [php symfony timeboxx:check-missing-bookings|INFO]
EOF;
    }

    protected function execute($arguments = array(), $options = array())
    {
        // initialize the database connection
        $databaseManager = new sfDatabaseManager($this->configuration);
        $connection = $databaseManager->getDatabase($options['connection'])->getConnection();

        $users = UserTable::getInstance()->findAllUnlocked();

        foreach($users as $user) {

            if (false == TimeLogItemTable::getInstance()->updateMissedBookings(time(), $user)) {
                if ($user->Setting->reminder == true) {

                }
            }            
        }
    }

}