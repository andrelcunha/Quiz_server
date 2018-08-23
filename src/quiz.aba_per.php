            <h3>Perguntas</h3>
            <div class="w-100">
                <div class="btn-toolbar" role="toolbar">
                    <div class="btn-group mr-2" role="group">
                        <button type="button" class="btn btn-primary">Nova</button>
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
                        <textarea class="form-control" id="enunciadotexto" name="enunciadotexto"></textarea>
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
                                <input type="radio" id="d1" name="dificuldade" autocomplete="off" value="1" checked /> 1 (Fácil)
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" id="d2" name="dificuldade" autocomplete="off" value="2" /> 2 (Médio)
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" id="d3" name="dificuldade" autocomplete="off" value="3" /> 3 (Difícil)
                            </label>
                            <!--
                            <label class="btn btn-secondary">
                                <input type="radio" id="d4" name="dificuldade" autocomplete="off" value="4" /> 4
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" id="d5" name="dificuldade" autocomplete="off" value="5" /> 5 (Difícil)
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
                                <input type="radio" id="raleatoria" name="resprandom" autocomplete="off" value="1" checked /> São Aleatórias
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" id="rsequencial" name="resprandom" autocomplete="off" value="0" /> São Sequenciais
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-2">
                        <label for="sequencia">Sequência</label>
                        <input type="number" class="form-control" id="sequencia" name="sequencia" min="1" max="99" value="1" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-2">
                        <label for="pontos">Pontuação Desta Pergunta</label>
                        <input type="number" class="form-control" id="pontos" name="pontos" min="0" max="999999" value="0" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-3">
                        <label for="pergativa">Ativa</label>
                        <br />
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-success">
                                <input type="radio" id="pergativa_true" name="pergativa" autocomplete="off" value="1" checked /> Sim
                            </label>
                            <label class="btn btn-danger active">
                                <input type="radio" id="pergativa_false" name="pergativa" autocomplete="off" value="0" /> Não
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
                <hr />
                <h3>Respostas</h3>
                <br />
                
                <button type="button" class="btn btn-success" onclick="EnviarPergunta()">Salvar</button>
                <button type="button" class="btn btn-warning">Cancelar</button>
            </form>
            <hr />
            <div id="content"></div>
            <!--
            <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">
                                Id
                            </th>
                            <th scope="col">
                                Texto
                            </th>
                            <th scope="col">
                                Peso
                            </th>
                            <th scope="col">
                                Correta
                            </th>
                            <th scope="col">
                                Proximidade Correta
                            </th>
                            <th scope="col">
                                Opções
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="6">
                                <button id="novaresposta" class="btn btn-link">
                                    <i class="material-icons">add_circle</i> Nova Opção
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            -->

            
    