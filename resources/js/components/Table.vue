<template>
<div>
         <table class="table table-hover">
              <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome da Marca</th>
                    <th scope="col">Logo</th>
     
                </tr>
            </thead>
            <tbody>
                <tr v-for="m in dados" :key="m.id">
                    <th scope="row">{{m.id}}</th>
                    <td>{{m.nome}}</td>
                    <td><img :src="'/storage/'+m.imagem"></td>
                </tr>
            </tbody>
        </table>

    
</div>
</template>

<script>
    export default {
            props: ['dados']
    }
</script>
