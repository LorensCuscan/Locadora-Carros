<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                
                
                <!-- início do card de busca -->
                <card-component titulo="Busca de marcas">
                    <template v-slot:conteudo>
                        <div class="row g-3">
                            <div class="col mb-3">
                                <input-container-component titulo="ID" id="inputId" id-help="numberHelp" texto-ajuda="Opcional. Informe o ID da marca">
                                    <input type="number" class="form-control" id="inputId" aria-describedby="numberHelp" placeholder="ID">
                                </input-container-component>     
                                             
                            </div>
                            <div class="col mb-3">
                                <input-container-component titulo="Nome da marca" id="inputNome" id-help="nomeHelp" texto-ajuda="Opcional. Informe o nome da marca">
                                    <input type="text" class="form-control" id="inputNome" aria-describedby="nomeHelp" placeholder="Nome da marca">
                                </input-container-component>
                                
                            </div>
                        </div>
                    </template>
                    
                    <template v-slot:rodape>
                        <button type="submit" class="btn btn-primary btn-sm float-right">Pesquisar</button>
                    </template>
                </card-component>
                <!-- fim do card de busca -->


                <!-- início do card de listagem de marcas -->
                <card-component titulo="Relação de marcas">
                    <template v-slot:conteudo>
                        <table-component></table-component>
                    </template>

                    <template v-slot:rodape>
                        <button type="button" class="btn btn-primary btn-sm float-right" data-bs-toggle="modal" data-bs-target="#modalMarca">Adicionar</button>
                    </template>
                </card-component>
                <!-- fim do card de listagem de marcas -->
            </div>


     <modal-component id="modalMarca" titulo="Adicionar marca">

        <template v-slot:alertas>
            <alert-component tipo="success" :detalhes="transicaoDetalhes" titulo="Cadastro realizado com sucesso!" v-if="transicaoStatus == 'adicionado'"></alert-component>
            <alert-component tipo="danger" :detalhes="transicaoDetalhes" titulo="Erro ao tentar cadastrar a marca:" v-if="transicaoStatus == 'erro'"></alert-component>
           
        </template>


            <template v-slot:conteudo>
                <div class="form-group">
                    <input-container-component titulo="Nome da marca" id="novoNome" id-help="novoNomeHelp" >
                        <input type="text" class="form-control" id="novoNome" aria-describedby="novoNomeHelp" placeholder="Informe o nome da marca" v-model="nomeMarca">
                    </input-container-component>
                   
                </div>

                <div class="form-group">
                    <input-container-component  titulo="" id="novoImagem" id-help="novoImagemHelp" texto-ajuda="Selecione uma imagem no formato PNG">
                    <br>
                        <input type="file" class="form-control-file" id="novoImagem" aria-describedby="novoImagemHelp" placeholder="Selecione uma imagem" @change="carregarImagem($event)">
                    </input-container-component>
              
                </div>
            </template>
 
            <template v-slot:rodape>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" @click="salvar">Salvar</button>
            </template>
        </modal-component>

        <button type="button" @click="carregarLista">Teste</button>
</div>      
</div>
</template>

<script>
export default {
                computed: {
                token() {

                let token = document.cookie.split(';').find(indice => {
                    return indice.includes('token=')
                })

                token = token.split('=')[1]
                token = 'Bearer ' + token

                return token
            }
                    },
                data() {
                    return {
                        urlBase: 'http://localhost:8000/api/v1/marca',
                    nomeMarca: '',
                    arquivoImagem: [],
                    transicaoStatus: '',
                    transicaoDetalhes: {},
                    marcas: []
                    };
                },
                methods: {  
                    carregarLista(e){
                          let config = {
                            headers: {
                                'Content-Type' : 'multipart/form-data',
                                'Accept': 'application/json',
                                'Authorization': this.token
                            }
                        }
                    },
                   
                    carregarImagem(e) {
                    this.arquivoImagem = e.target.files;
                    },
                    salvar() {
                        console.log(this.nomeMarca, this.arquivoImagem)

                        let formData = new FormData();
                        formData.append('nome', this.nomeMarca)
                        formData.append('imagem', this.arquivoImagem[0])

                        let config = {
                            headers: {
                                'Content-Type' : 'multipart/form-data',
                                'Accept': 'application/json',
                                'Authorization': this.token
                            }
                        }

                        axios.post(this.urlBase, formData, config)
                        .then(response => {
                            this.transicaoStatus = 'adicionado'
                            this.transicaoDetalhes = {
                                mensagem: 'Id do registro:' + response.data.id
                          
                            }
                            console.log(response)
                        })
                        .catch(errors => {
                             this.transicaoStatus = 'erro'
                             this.transicaoDetalhes = {
                                mensagem: errors.response.data.message,
                                dados: errors.response.data.errors
                             }
                        })
                    }
                },
                
                    mounted(){
                        this.carregarLista()
                    }
                };
                </script>