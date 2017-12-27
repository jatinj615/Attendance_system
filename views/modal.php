<?php include 'header.php' ?>
<button class="btn btn-danger" data-toggle="modal" data-target="#md-remove" type="button">Remove Brand</button>
          	
<div id="md-remove" tabindex="-1" role="dialog" class="modal fade">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                  </div>
                  <div class="modal-body">
                    <div class="text-center">
                      <h3>Are You Sure ??</h3>
                      
                      <div class="xs-mt-50"> 
        				
                      	<button id="removeBrand" type="button" data-dismiss="modal" class="btn btn-space btn-danger">Confirm</button>
                        <button type="button" data-dismiss="modal" class="btn btn-space btn-default">Cancel</button>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer"></div>
                </div>
              </div>
            </div>
<div class="modal-overlay"></div>
<?php include 'footer.php' ?>