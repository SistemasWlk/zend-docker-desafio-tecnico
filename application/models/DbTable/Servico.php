<?php

class Application_Model_DbTable_Servico extends Zend_Db_Table_Abstract
{

    protected $_name = 'servico';

    public function getServico($id)
    {
        $id = (int)$id;
        $row = $this->fetchRow('id = ' . $id);
        if (!$row) {
            throw new Exception("Registro não encontrado para o serviço $id");
        }
        return $row->toArray();
    }

    public function addServico($descricao)
    {
        $data = array(
            'descricao' => $descricao,
        );
        $this->insert($data);
    }

    public function updateServico($id, $descricao)
    {
        $data = array(
            'descricao' => $descricao,
        );
        $this->update($data, 'id = '. (int)$id);
    }

    public function deleteServico($id)
    {
        $this->delete('id =' . (int)$id);
    }
}

