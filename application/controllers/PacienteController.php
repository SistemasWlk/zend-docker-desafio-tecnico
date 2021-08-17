<?php

class PacienteController extends Zend_Controller_Action
{

    private $oTbPaciente;
    private $oTbConvernio;

    public function init()
    {
        $this->logger = Zend_Registry::get('logger');
        $this->oTbPaciente = new Application_Model_DbTable_Paciente();
        $this->oTbConvernio = new Application_Model_DbTable_Convernio();
    }

    public function indexAction()
    {
        $this->view->pacientes = $this->oTbPaciente->fetchAll();
    }

    public function addAction()
    {

        if($this->getRequest()->isPost())
        {

            $sNome           = $this->getRequest()->getParam("nome", "");
            $cSexo           = $this->getRequest()->getParam("sexo", "");
            $dDataNascimento = $this->getRequest()->getParam("data_nascimento", "");
            $iConvernio      = $this->getRequest()->getParam("id_convernio", "");

            $this->view->convernios = $this->oTbConvernio->fetchAll();

            if(!$this->oTbPaciente->addPaciente($sNome, $cSexo, $dDataNascimento, $iConvernio))
                $this->view->resp = "Paciente " . $sDescricao. ", inserido com sucesso!";
            else
                $this->view->resp = "Paciente " . $sDescricao. ", nao inserido!";
        }else{
            $this->view->convernios = $this->oTbConvernio->fetchAll();
        }

    }

    public function editAction()
    {

        $bEditar = $this->getRequest()->getParam("editar", "");

        if (!$bEditar) {
            $iId = $this->getRequest()->getParam("id", "");

            $this->view->paciente  = $this->oTbPaciente->getPaciente($iId);
            $this->view->convernios = $this->oTbConvernio->fetchAll();
        }else{

            $iId             = $this->getRequest()->getParam("id", "");
            $sNome           = $this->getRequest()->getParam("nome", "");
            $cSexo           = $this->getRequest()->getParam("sexo", "");
            $dDataNascimento = $this->getRequest()->getParam("data_nascimento", "");
            $iConvernio      = $this->getRequest()->getParam("id_convernio", "");


            if(!$this->oTbPaciente->updatePaciente($iId, $sNome, $cSexo, $dDataNascimento, $iConvernio ))
                $resp = "Paciente " . $iId. ", atualizado com sucesso!";
            else
                $resp = "Paciente " . $iId. ", nao atualizado!";

            $data = array(
                'id'                => $iId,
                'nome'              => $sNome,
                'sexo'              => $cSexo,
                'data_nascimento'   => $dDataNascimento,
                'id_convernio'      => $iConvernio,
                'resp'              => $resp
            );

            $this->view->convernios = $this->oTbConvernio->fetchAll();
            $this->view->paciente  = $data;

        }
    }

    public function deleteAction()
    {
        $iId = $this->getRequest()->getParam("id", "");

        if(!$this->oTbPaciente->deletePaciente($iId))
            $this->view->resp = "Paciente " . $iId. ", deletado com sucesso!";
        else
            $this->view->resp = "Paciente " . $iId. ", nao deletado!";

    }


}







