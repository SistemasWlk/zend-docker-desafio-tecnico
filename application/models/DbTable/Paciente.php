<?php

class Application_Model_DbTable_Paciente extends Zend_Db_Table_Abstract
{

    protected $_name = 'paciente';

    public function getPaciente($id)
    {
        $id = (int)$id;
        $row = $this->fetchRow('id = ' . $id);
        if (!$row) {
            throw new Exception("Registro não encontrado para o paciente $id");
        }
        return $row->toArray();
    }

    public function addPaciente($nome, $sexo, $data_nascimento, $id_convernio)
    {
        $data = array(
            'nome' => $nome,
            'sexo' => $sexo,
            'data_nascimento' => $data_nascimento,
            'id_convernio' => $id_convernio,
        );
        $this->insert($data);
    }

    public function updatePaciente($id, $nome, $sexo, $data_nascimento, $id_convernio)
    {
        $data = array(
            'nome' => $nome,
            'sexo' => $sexo,
            'data_nascimento' => $data_nascimento,
            'id_convernio' => $id_convernio,
        );
        $this->update($data, 'id = '. (int)$id);
    }

    public function deletePaciente($id)
    {
        $this->delete('id =' . (int)$id);
    }

}

