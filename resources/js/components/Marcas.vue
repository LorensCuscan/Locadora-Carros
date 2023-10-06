

<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">


                   <!--inicio do card de busca!-->
                <div class="card mb-3">
                    <div class="card-header">Busca de marcas</div>

                    <div class="card-body">
                     
                        <div class="row g-3">
                            <div class="col-md-6 mb-3 d-flex flex-column">
                                <input-container-component titulo="ID" id="inputId" id-help="idHelp" texto-ajuda="Opcional. Informe o ID da marca">
                             
                                    <input type="number" class="form-control" id="inputId" aria-describedby="idHelp" placeholder="ID">

                                </input-container-component>                                       
                            </div>


                            <div class="col-md-6 mb-3 d-flex flex-column">

                                <input-container-component titulo="Nome da marca" id="inputNome" id-help="nomeHelp" texto-ajuda="Opcional. Informe o ID da marca">
                             
                                    <input type="text" class="form-control" id="inputNome" aria-describedby="nomeHelp" placeholder="Nome da marca">
                                    
                                </input-container-component>
                            </div>
                        </div>
                        <div class="card-footer" >
                             <button type="submit" class="btn btn-primary btn-sm float-right">Pesquisar</button>
                        </div>
                    </div>                  
                </div>
                     <!--fim do card de busca!-->


                    <!--inicio do card de lsitagem de marcas -->
                     <div class="card">
                    <div class="card-header">Relação de marcas</div>

                    <div class="card-body">
                       <table-component></table-component>
                    </div>
                    <div class="card-footer" >
                             <button type="button" class="btn btn-primary btn-sm float-right">Adicionar</button>
                    </div>
                    </div>
                        
            </div>                  
        </div>
                    <!--fim do card de lsitagem de marcas -->
        </div>
       
</template>


