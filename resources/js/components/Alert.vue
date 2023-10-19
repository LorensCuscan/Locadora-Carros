<template>
    <div :class="estilo" role="alert">
        {{titulo}}    
        <ul  v-if="detalhes.data.errors">
         <span v-if="detalhes.data.message">{{ detalhes.data.message }}</span>
         <span v-if="detalhes.data.id">{{'Id do registro:' + detalhes.data.id }}</span>
            <li v-for="e, key in detalhes.data.errors" :key="key">{{ e[0] }}</li>           
        </ul>
    </div>
</template>

<script>
    export default { 
        props: ['tipo', 'titulo', 'detalhes'],
        computed: {
            estilo() {
                return 'alert alert-'+this.tipo
            }
        }
    }
</script>
