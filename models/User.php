<?php
/**
 * Created by PhpStorm.
 * User: Анастасия
 * Date: 06.01.2019
 * Time: 23:00
 */

namespace models;

class User extends Model
{
    public $id;
    public $login;
    public $password;
    public $email;

    protected $tableName = 'users';
}