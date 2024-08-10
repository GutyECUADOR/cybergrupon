  <!-- modal -->
<div class="modal fade" id="modalpromo" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <div class="row">

                    @foreach ($linksPublicidad as $publicidad)
                        <div class="col col-md-6 text-center">
                            <iframe width="100%" height="200px"
                                src="{{ $publicidad->link_publicidad }}"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                            <a href="{{ $publicidad->link_redireccion }}" target="_blank" class="btn btn-success btn-sm mt-3 mb-3">Más información</a>
                        </div>
                    @endforeach
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
