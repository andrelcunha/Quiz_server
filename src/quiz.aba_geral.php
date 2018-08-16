            <div id="diverros" class="alert alert-danger" role="alert" style="display: none">
                <h4 id="titerro" class="alert-heading"></h4>
                <div id="divtexto">
                </div>
            </div>
            <form id="formquiz" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-5">
                        <label for="codigo">Id</label>
                        <input type="text" class="form-control sm-2" id="codigo" name="codigo" placeholder="REGISTRO NOVO" readonly="readonly" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-5">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <label for="nomecliente">Cliente</label>
                        <div class="row">
                            <div class="col-2 input-group">
                                <input type="text" class="form-control" id="nomecliente" name="nomecliente" />
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#divBuscarCliente">
                                        ...
                                    </button>
                                    <?php
                                    $cbscliente         = array(    new CampoBusca('Nome', 6, 'Nome'),
                                                                    new CampoBusca('Empresa', 8, 'Empresa'),
                                                                    new CampoBusca('Setor', 6, 'Setor')
                                                                );

                                    gerarBusca('Procurar Clientes', $cbscliente, 'cliente', 'nomecliente', 'nomecompcliente', 'Cliente');
                                    ?>
                                </div>
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control" id="nomecompcliente" name="nomecompcliente" readonly="reaonly" />
                                <input type="hidden" id="cliente" name="cliente" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-2">
                        <label for="dataini">Data In&iacute;cial na Produ&ccedil;&atilde;o</label>
                        <input type="date" class="form-control" id="dataini" name="dataini" />
                    </div>
                    <div class="col-2">
                        <label for="datafim">Data Final na Produ&ccedil;&atilde;o</label>
                        <input type="date" class="form-control" id="datafim" name="datafim" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-2">
                        <label for="tentativas">Tentativas M&aacute;ximas</label>
                        <input type="number" class="form-control" id="tentativas" name="tentativas" min="0" max="99999" value="0" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-5">
                        <label for="logo">Logotipo do Quiz</label>
                        <input type="file" class="form-control" id="logo" name="logo" />
                    </div>
                    <div class="col-5">
                        <img src="" alt="" />
                        <?php
                        /*
                        Testar isso quando for fazer a conversão da imagem (Imagem para Base64):

                        $path = 'myfolder/myimage.png';
                        $type = pathinfo($path, PATHINFO_EXTENSION);
                        $data = file_get_contents($path);
                        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                        */
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-10">
                        <label for="estilo">CSS ou Estilo</label>
                        <textarea class="form-control" id="estilo" name="estilo"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-3">
                        <label for="pergrandom">As Perguntas Deste Quiz</label>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary active">
                                <input type="radio" name="options" id="aleatoria" name="pergrandom" autocomplete="off" value="1" checked /> São Aleatórias
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" name="options" id="sequencial" name="pergrandom" autocomplete="off" value="0" /> São Sequenciais
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-3">
                        <label for="aumdif">Aumentar Dificuldade Progressivamente</label>
                        <br />
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-success">
                                <input type="radio" name="options" id="aumsim" name="aumdif" autocomplete="off" value="1" /> Sim
                            </label>
                            <label class="btn btn-danger active">
                                <input type="radio" name="options" id="aumnao" name="aumdif" autocomplete="off" value="0" checked /> Não
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-2">
                        <label for="pontospadrao">Pontuação Padrão das Perguntas</label>
                        <input type="number" class="form-control" id="pontospadrao" name="pontospadrao" min="0" max="999999" value="0" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-5">
                        <label for="status">Status Atual: <strong>Novo</strong></label>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <hr />
                <button type="submit" class="btn btn-success">
                    Gravar
                </button>
                <a href="quizzes.php" class="btn btn-warning">
                    Voltar
                </a>
            </form>