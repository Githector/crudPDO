<?php
interface IMpsService
{

    public function openConnection();
    public function closeConnection();
    public function getAllMps():array;
    public function addMp(int $numMp, String $nomMp):boolean;
    public function getMpById(String $id):Mp;
    public function getMpByIdP(String $id):Mp;
    public function updateMpById(String $id):Mp;
    public function deleteMpById(String $id):Mp;
    public function getMpObjectById(String $id):Mp;

}