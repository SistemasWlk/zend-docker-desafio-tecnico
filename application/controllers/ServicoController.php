<?php

class ServicoController extends Zend_Controller_Action
{

    private $oTbServico;

    public function init()
    {
        $this->oTbServico = new Application_Model_DbTable_Servico();
    }

    public function indexAction()
    {
        $this->view->servicos = $this->oTbServico->fetchAll();
    }

    public function addAction()
    {

        if($this->getRequest()->isPost())
        {

            $sDescricao = $this->getRequest()->getParam("descricao", "");

            if(!$this->oTbServico->addServico($sDescricao))
                $this->view->resp = "Serviço " . $sDescricao. ", inserido com sucesso!";
            else
                $this->view->resp = "Serviço " . $sDescricao. ", nao inserido!";
        }

    }

    public function editAction()
    {

        $bEditar = $this->getRequest()->getParam("editar", "");

        if (!$bEditar) {
            $iId = $this->getRequest()->getParam("id", "");
            $this->view->servico = $this->oTbServico->getServico($iId);
        }else{
            $iId = $this->getRequest()->getParam("id", "");
            $sDescricao = $this->getRequest()->getParam("descricao", "");

            if(!$this->oTbServico->updateServico($iId, $sDescricao ))
                $resp = "Serviço " . $iId. ", atualizado com sucesso!";
            else
                $resp = "Serviço " . $iId. ", nao atualizado!";

            $data = array(
                'id'        => $iId,
                'descricao' => $sDescricao,
                'resp'      => $resp
            );

            $this->view->servico = $data;

        }
    }

    public function deleteAction()
    {
        $iId = $this->getRequest()->getParam("id", "");

        if(!$this->oTbServico->deleteServico($iId))
            $this->view->resp = "Serviço " . $iId. ", deletado com sucesso!";
        else
            $this->view->resp = "Serviço " . $iId. ", nao deletado!";

    }



}







