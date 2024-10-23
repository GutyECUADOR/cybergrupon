<div class="modal fade" id="modalpromo" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
              <div class="fireworks">
                <div class="modal-body" style="z-index: 2;">

                    <div class="container text-center">
                        <div class="row" style="justify-content: center;">
                            <div class="col col-md-8 col-sm-12">
                                <img class="img-fluid" src="{{ asset('assets/images/png/primermillon.png')}}" alt="Primer Millon">
                            </div>
                        </div>
                        <div class="row" style="justify-content: center;">


                            @foreach ($linksPublicidad as $publicidad)
                                <div class="col col-md-6 col-sm-12">
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


                </div>
                <div class="modal-footer" >
                    <button type="button" style="z-index: 2;" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
        </div>
    </div>
