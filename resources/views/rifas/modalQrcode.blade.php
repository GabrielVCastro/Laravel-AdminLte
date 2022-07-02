  <div class="modal fade" id="qrcodeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Pagamento via PIX</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">

            <div class="mb-3">{!! DNS2D::getBarcodeHTML("$qrcode", 'QRCODE') !!}</div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <a  href='rifas/comprar/{{ $item['id'] }}' class="btn btn-primary">Pago</a>
        </div>
      </div>
    </div>
  </div>
