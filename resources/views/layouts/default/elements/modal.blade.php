<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalBody">
                ...
            </div>
            <div class="modal-footer">
                <a class="btn btn-warning d-none" id="dataUrlEdit" href="">{{ __("Editar") }}</a>
                <form class="d-none" id="dataUrlDestroy" action="" method="post">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="confirmGeneric" value="{{ __("* Você está prestes a excluir este registro e não poderá recuperá-lo, deseja continuar?") }}">
                    <button class="btn btn-danger" type="submit"> {{ __("Excluir") }} </button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __("Fechar") }}</button>
                <button type="button" class="btn btn-primary d-none" id="saveChange">{{ __("Salvar") }}</button>
            </div>
        </div>
    </div>
</div>