  <!-- modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">

              <div class="modal-body">
                  <div class="row">
                    @foreach ($linksPublicidad as $publicidad)

                    @endforeach
                        <div class="col col-md-6">
                            <iframe width="100%" height="200px"
                                src="https://www.youtube.com/embed/Zv11L-ZfrSg?si=DJjYGHqRwT5a4lgC"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div>
                  </div>


              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              </div>
          </div>
      </div>
  </div>
