<?php
interface IMpsService
{

    public function openConnection();
    public function closeConnection();
    public function getAllMps();
    public function addMp($numMp,$nomMp);
    public function getMpById($id);
    public function getMpByIdP($id);
    public function updateMpById($mp);
    public function deleteMpById($id);
    public function getMpObjectById($id);

}