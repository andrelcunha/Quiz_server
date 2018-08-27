            <h3>Perguntas</h3>
            <div class="w-100">
                <div class="btn-toolbar" role="toolbar">
                    <div class="btn-group mr-2" role="group">
                        <button type="button" class="btn btn-primary" onclick="ResetFormPergunta()">Nova</button>
                    </div>
                    <div class="btn-group mr-2" role="group">
                        <button id="first" type="button" class="btn btn-info" onclick="loadFirstObject()">
                            <i class="material-icons">first_page</i>
                        </button>
                        <button id="previous" type="button" class="btn btn-info" onclick="loadPreviousObject()">
                            <i class="material-icons">chevron_left</i>
                        </button>
                        <button id="next" type="button" class="btn btn-info" onclick="loadNextObject()">
                            <i class="material-icons">chevron_right</i>
                        </button>
                        <button id="last" type="button" class="btn btn-info" onclick="loadLastObject()">
                            <i class="material-icons">last_page</i>
                        </button>                        
                    </div>
                    <div class="mr-2 mt-auto mb-auto">
                        <p id="registro">Registro 1/x</p>
                    </div>
                    <div class="btn-group ml-auto" role="group">
                        <button type="button" class="btn btn-danger">Excluir</button>
                    </div>
                </div>
            </div>
            <br />
            <form id="formpergunta"  method="post" enctype="multipart/form-data">
                <input type="hidden" id="quiz_id" name="quiz_id" 
                <?php if ($quiz!=NULL) {echo("value='$quiz->Id'");}?>
                />
                <div class="form-group row">
                    <div class="col-3">
                        <label for="pergcodigo">Id</label>
                        <input type="texto" class="form-control sm-2" id="pergcodigo" name="pergcodigo" placeholder="PERGUNTA NOVA" readonly="readonly" 
                        <?php if ($pergunta!=NULL) {echo("value='$pergunta->Id'");}?>
                        />
                    </div>
                </div>
                <!--
                <div class="form-group row">
                    <div class="col-3">
                        <label for="tipoperg">Tipo de Enunciado</label>
                        <br />
                        <div id="tipopergsel" class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary active">
                                <input type="radio" id="texto" name="tipoperg" autocomplete="off" checked /> Texto
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" id="imagem" name="tipoperg" autocomplete="off" /> Imagem
                            </label>
                        </div>
                    </div>
                </div>
                -->
                <div id="divenuntexto" class="form-group row">
                    <div class="col-10">
                        <label for="enunciadotexto">Enunciado</label>
                        <textarea class="form-control" id="enunciadotexto" name="enunciadotexto"><?php if($pergunta!=NULL){echo(utf8_encode($pergunta->Enunciado));}?></textarea>
                    </div>
                </div>
                <div id="divenunimagem" class="form-group row" style="display: none">
                    <div class="col-5">
                        <label for="enunciadoimagem">Enunciado</label>
                        <input type="file" class="form-control" id="enunciadoimagem" name="enunciadoimagem" />
                    </div>
                    <div class="col-5">
                        <img src="" alt="Imagem" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-3">
                        <label for="dificuldade">Dificuldade</label>
                        <br />
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary active">
                                <input type="radio" id="d1" name="dificuldade" autocomplete="off" value="1" 
                                       <?php  if ($pergunta->Dificuldade == 1) {echo(" checked=\"checked\" ");}?>
                                /> 1 (Fácil)
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" id="d2" name="dificuldade" autocomplete="off" value="2" 
                                       <?php  if ($pergunta->Dificuldade == 2) {echo(" checked=\"checked\" ");}?>
                                       /> 2 (Médio)
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" id="d3" name="dificuldade" autocomplete="off" value="3" 
                                       <?php  if ($pergunta->Dificuldade == 3) {echo(" checked=\"checked\" ");}?>
                                       /> 3 (Difícil)
                            </label>
                            <!--
                            <label class="btn btn-secondary">
                                <input type="radio" id="d4" name="dificuldade" autocomplete="off" value="4" 
                                       <?php  if ($pergunta->Dificuldade == 4) {echo(" checked=\"checked\" ");}?>
                            /> 4
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" id="d5" name="dificuldade" autocomplete="off" value="5" 
                                       <?php  if ($pergunta->Dificuldade == 5) {echo(" checked=\"checked\" ");}?>
                            /> 5 (Difícil)
                            </label>
                            -->
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-3">
                        <label for="resprandom">As Respostas Desta Pergunta</label>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary active">
                                <input type="radio" id="raleatoria" name="resprandom" autocomplete="off" value="1" 
                                       <?php  if ($pergunta->RespostasRandom == 1) {echo(" checked=\"checked\" ");}?>
                                       /> São Aleatórias
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" id="rsequencial" name="resprandom" autocomplete="off" value="0" 
                                       <?php  if ($pergunta->RespostasRandom == 0) {echo(" checked=\"checked\" ");}?>
                                       /> São Sequenciais
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-2">
                        <label for="sequencia">Sequência</label>
                        <input type="number" class="form-control" id="sequencia" name="sequencia" min="1" max="99"
                               <?php if ($pergunta!=NULL) {echo("value='$pergunta->Sequencia'");}
                               else { echo ("value=1");}?>
                               />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-2">
                        <label for="pontos">Pontuação Desta Pergunta</label>
                        <input type="number" class="form-control" id="pontos" name="pontos" min="0" max="999999"
                               <?php if ($pergunta!=NULL) {echo("value='$pergunta->Pontos'");}
                               else { echo ("value=0");}?>
                               />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-3">
                        <label for="pergativa">Ativa</label>
                        <br />
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-success">
                                <input type="radio" id="pergativa_true" name="pergativa" autocomplete="off" value="1"
                                       <?php  if ($pergunta->Cancelada == 0) {echo(" checked=\"checked\" ");}?>
                                       /> Sim
                            </label>
                            <label class="btn btn-danger active">
                                <input type="radio" id="pergativa_false" name="pergativa" autocomplete="off" value="0"
                                       <?php  if ($pergunta->Cancelada == 1) {echo(" checked=\"checked\" ");}?>
                                       /> Não
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-5">
                        <label for="tiposrespostas">Tipo das Respostas</label>
                        <select id="tiposrespostas" name="tiposrespostas" class="form-control">
                            
                            <?php
                            foreach ($tpresparr as $tpresp)
                            {
                                echo("<option value=\"$tpresp->Id\">". utf8_encode($tpresp->Nome) . "</option>\n");
                            }
                            ?>
                        </select>
                    </div>
                </div>
           
                
                <button type="button" class="btn btn-success" onclick="EnviarPergunta()">Salvar</button>
                <button type="button" class="btn btn-warning">Cancelar</button>
            </form>
            <br />
            <div id="content"></div>
           

            
    