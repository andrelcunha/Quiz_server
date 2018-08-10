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
            <form>
                <div class="form-group row">
                    <div class="col-3">
                        <label for="pergcodigo">Id</label>
                        <input type="password" class="form-control sm-2" id="pergcodigo" nome="pergcodigo" placeholder="PERGUNTA NOVA" readonly="readonly" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-3">
                        <label for="tipoperg">Tipo de Enunciado</label>
                        <br />
                        <div id="tipopergsel" class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary active">
                                <input type="radio" name="options" id="texto" name="tipoperg" autocomplete="off" checked /> Texto
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" name="options" id="imagem" name="tipoperg" autocomplete="off" /> Imagem
                            </label>
                        </div>
                    </div>
                </div>
                <div id="divenuntexto" class="form-group row">
                    <div class="col-10">
                        <label for="enunciadotexto">Enunciado</label>
                        <textarea class="form-control" id="enunciadotexto" nome="enunciadotexto"></textarea>
                    </div>
                </div>
                <div id="divenunimagem" class="form-group row" style="display: none">
                    <div class="col-5">
                        <label for="enunciadoimagem">Enunciado</label>
                        <input type="file" class="form-control" id="enunciadoimagem" nome="enunciadoimagem" />
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
                                <input type="radio" name="options" id="d1" name="dificuldade" autocomplete="off" checked /> 1 (Fácil)
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" name="options" id="d2" name="dificuldade" autocomplete="off" /> 2
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" name="options" id="d3" name="dificuldade" autocomplete="off" /> 3
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" name="options" id="d4" name="dificuldade" autocomplete="off" /> 4
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" name="options" id="d5" name="dificuldade" autocomplete="off" /> 5 (Difícil)
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-3">
                        <label for="resprandom">As Respostas Desta Pergunta</label>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary active">
                                <input type="radio" name="options" id="raleatoria" name="resprandom" autocomplete="off" checked /> São Aleatórias
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" name="options" id="rsequencial" name="resprandom" autocomplete="off" /> São Sequenciais
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-2">
                        <label for="sequencia">Sequência</label>
                        <input type="number" class="form-control" id="sequencia" nome="sequencia" min="1" max="99" value="1" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-2">
                        <label for="pontos">Pontuação Desta Pergunta</label>
                        <input type="number" class="form-control" id="pontos" nome="pontos" min="0" max="999999" value="0" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-3">
                        <label for="pergativa">Ativa</label>
                        <br />
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-success">
                                <input type="radio" name="options" id="pergativa" name="pergativa" autocomplete="off" checked /> Sim
                            </label>
                            <label class="btn btn-danger active">
                                <input type="radio" name="options" id="pergdesativa" name="pergativa" autocomplete="off" /> Não
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-5">
                        <label for="tiposrespostas">Tipo das Respostas</label>
                        <select id="tiposrespostas" name="tiposrespostas" class="form-control">
                            <option>--- Todos os tipos ---</option>
                            <?php
                            foreach ($tpresparr as $tpresp)
                            {
                                echo("<option value=\"$tpresp->Id\">$tpresp->Nome</option>\n");
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <hr />
                <h3>Respostas</h3>
                <br />
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
                <hr />
                <button type="button" class="btn btn-success">Salvar</button>
                <button type="button" class="btn btn-warning">Cancelar</button>
            </form>