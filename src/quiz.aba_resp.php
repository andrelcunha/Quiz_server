            <h3>Resposta</h3>
            <div class="w-100">
                <div class="btn-toolbar" role="toolbar">
                    <div class="btn-group mr-2" role="group">
                        <button type="button" class="btn btn-primary" onclick="ResetFormResposta()">Nova</button>
                    </div>
                    <div class="btn-group mr-2" role="group">
                        <button type="button" class="btn btn-info">
                            <i class="material-icons">first_page</i>
                        </button>
                        <button type="button" class="btn btn-info">
                            <i class="material-icons">chevron_left</i>
                        </button>
                        <button type="button" class="btn btn-info">
                            <i class="material-icons">chevron_right</i>
                        </button>
                        <button type="button" class="btn btn-info">
                            <i class="material-icons">last_page</i>
                        </button>                        
                    </div>
                    <div class="mr-2 mt-auto mb-auto">
                        Registro 1/x
                    </div>
                    <div class="btn-group ml-auto" role="group">
                        <button type="button" class="btn btn-danger">Excluir</button>
                    </div>
                </div>
            </div>
            <br />
            <form id="formresposta" method="post" enctype="multipart/form-data">
                <input type="hidden" id="pergunta_id" name="pergunta_id" 
                <?php if ($pergunta!=NULL) {echo("value='$pergunta->Id'");}?>
                />
                <div class="form-group row">
                    <div class="col-3">
                        <label for="respcodigo">Id</label>
                        <input type="texto" class="form-control sm-2" id="respcodigo" name="respcodigo" placeholder="RESPOSTA NOVA" readonly="readonly" 
                        <?php if ($resposta!=NULL) {echo("value='$resposta->Id'");}?>
                        />
                    </div>
                </div>
                <div id="divresptexto" class="form-group row">
                    <div class="col-10">
                        <label for="resptexto">Texto</label>
                        <textarea class="form-control" id="resptexto" name="resptexto"><?php if($resposta!=NULL){echo($resposta->Texto);}?></textarea>
                    </div>
                </div>
                <!--
                <div class="form-group row">
                    <div class="col-2">
                        <label for="peso">Peso</label>
                        <input type="number" class="form-control" id="peso" name="peso" min="1" max="99"  
                        <?php 
                        //if ($resposta!=NULL){echo("value=$resposta->Peso");}
                        //else {echo("value=0");}
                        ?>
                        />
                    </div>
                </div>
                -->
                <div class="form-group row">
                    <div class="col-3">
                        <label for="respcorreta">Correta</label>
                        <br />
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-success active">
                                <input type="radio" id="correta_true" name="respcorreta" autocomplete="off" value="1" 
                                <?php  if ($resposta->Correta) {echo(" checked=\"checked\" ");}?>                                
                                /> Sim
                            </label>
                            <label class="btn btn-danger active">
                                <input type="radio" id="correta_false" name="respcorreta" autocomplete="off" value="0" 
                                <?php  if (!$resposta->Correta) {echo(" checked=\"checked\" ");}?>                                
                                /> Não
                            </label>
                        </div>      
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-3">
                        <label for="nivelproxcorreta">Nível de Proximidade da Resposta Correta</label>
                        <br />
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary active">
                                <input type="radio" id="n1" name="nivelproxcorreta" autocomplete="off" value="1"
                                <?php  if ($resposta->NivelProximidadeCorreta == 1) {echo(" checked=\"checked\" ");}?>                                
                                /> 1 (Fácil)
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" id="n2" name="nivelproxcorreta" autocomplete="off" value="2" 
                                <?php  if ($resposta->NivelProximidadeCorreta == 2) {echo(" checked=\"checked\" ");}?>                                
                                /> 2
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" id="n3" name="nivelproxcorreta" autocomplete="off" value="3" 
                                <?php  if ($resposta->NivelProximidadeCorreta == 3) {echo(" checked=\"checked\" ");}?>                                
                                /> 3
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" id="n4" name="nivelproxcorreta" autocomplete="off" value="4" 
                                <?php  if ($resposta->NivelProximidadeCorreta == 4 ) {echo(" checked=\"checked\" ");}?>                                
                                /> 4
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" id="n5" name="nivelproxcorreta" autocomplete="off" value="5" 
                                <?php  if ($resposta->NivelProximidadeCorreta == 5) {echo(" checked=\"checked\" ");}?>                                
                                /> 5 (Difícil)
                            </label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Salvar</button>
                <button type="button" class="btn btn-warning">Cancelar</button>
            </form>
    