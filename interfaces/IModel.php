<?php

namespace interfaces;

interface IModel
{
    function getOne(int $id);

    function getAll();

    function getTableName() : string;

}