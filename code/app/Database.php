<?php
namespace App;

class Database
{
    /**
     * @codeCoverageIgnore
     */
    public function getEmailAndLastName()
    {
        echo 'real db touched';
        echo 'real db touched'; // @codeCoverageIgnore

        // @codeCoverageIgnoreStart
        echo 'real db touched';
        echo 'real db touched';
        echo 'real db touched';
        // @codeCoverageIgnoreEnd
    }
}
