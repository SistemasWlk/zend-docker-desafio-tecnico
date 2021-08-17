<?php

class ConvernioController extends Zend_Controller_Action
{

    private $oTbConvernio;

    public function init()
    {
        $this->oTbConvernio = new Application_Model_DbTable_Convernio();
    }

    public function indexAction()
    {
        $this->view->convernios = $this->oTbConvernio->fetchAll();
    }

    public function addAction()
    {

        if($this->getRequest()->isPost())
        {

            $sDescricao = $this->getRequest()->getParam("descricao", "");

            if(!$this->oTbConvernio->addConvernio($sDescricao))
                $this->view->resp = "Convêrnio " . $sDescricao. ", inserido com sucesso!";
            else
                $this->view->resp = "Convêrnio " . $sDescricao. ", nao inserido!";
        }

    }

    public function editAction()
    {

        $bEditar = $this->getRequest()->getParam("editar", "");

        if (!$bEditar) {
            $iId = $this->getRequest()->getParam("id", "");
            $this->view->convernio = $this->oTbConvernio->getConvernio($iId);
        }else{
            $iId = $this->getRequest()->getParam("id", "");
            $sDescricao = $this->getRequest()->getParam("descricao", "");

            if(!$this->oTbConvernio->updateConvernio($iId, $sDescricao ))
                $resp = "Convêrnio " . $iId. ", atualizado com sucesso!";
            else
                $resp = "Convêrnio " . $iId. ", nao atualizado!";

            $data = array(
                'id'        => $iId,
                'descricao' => $sDescricao,
                'resp'      => $resp
            );

            $this->view->convernio = $data;

        }
    }

    public function deleteAction()
    {
        $iId = $this->getRequest()->getParam("id", "");

        if(!$this->oTbConvernio->deleteConvernio($iId))
            $this->view->resp = "Convêrnio " . $iId. ", deletado com sucesso!";
        else
            $this->view->resp = "Convêrnio " . $iId. ", nao deletado!";

    }


}







