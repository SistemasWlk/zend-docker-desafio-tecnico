<?php

class Application_Model_DbTable_Convernio extends Zend_Db_Table_Abstract
{

    protected $_name = 'convernio';

    public function getConvernio($id)
    {
        $id = (int)$id;
        $row = $this->fetchRow('id = ' . $id);
        if (!$row) {
            throw new Exception("Registro não encontrado para o convênio $id");
        }
        return $row->toArray();
    }

    public function addConvernio($descricao)
    {
        $data = array(
            'descricao' => $descricao
        );
        $this->insert($data);
    }

    public function updateConvernio($id, $descricao)
    {
        $data = array(
            'descricao' => $descricao,
        );
        $this->update($data, 'id = '. (int)$id);
    }

    public function deleteConvernio($id)
    {
        $this->delete('id =' . (int)$id);
    }
}

