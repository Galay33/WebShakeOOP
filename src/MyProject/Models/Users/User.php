<?php


namespace MyProject\Models\Users;

use MyProject\Models\ActiveRecordEntity;
class User extends ActiveRecordEntity
{
    /**@var string*/
    private $nickName;

    /**@var string*/
    private $email;

     /**@var int*/
    private $isConfirmed;

     /**@var string*/
    private $role;

     /**@var string*/
    private $passwordHash;

     /**@var string*/
    private $autgToken;

     /**@var string*/
    private $createdAt;

    /**
     * @return string
     */

    public function getNickname(): string
    {
        return $this->nickname;
    }

    protected static function getTableName(): string
    {
        return 'users';
    }
}