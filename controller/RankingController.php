<?php

class RankingController{

    private $rankingModel;
    private $renderer;


    public function __construct($rankingModel,$renderer){
        $this->rankingModel = $rankingModel;
        $this->renderer = $renderer;
    }


    public function obtenerRanking(){
        $data["usuarios"] = $this->rankingModel->listar();
        $this->renderer->render("ranking", $data);
    }


}