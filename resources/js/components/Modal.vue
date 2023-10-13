<template>
    <div class="modal fade" :id="id" aria-labelledby="exampleModalLabel" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{titulo}}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <slot name="conteudo"></slot>
            </div>
                <div class="modal-footer">
                    <slot name="rodape"></slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['id', 'titulo']
    }
</script>
