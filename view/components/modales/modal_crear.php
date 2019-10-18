<?php
$id = $_GET['identificador'];
$campos = $_GET['obj'];
if (is_array($campos)) {
    $campos = count($campos);
    if ($campos > 5) {
        $tipo = 'lg';
    } elseif ($campos <= 5) {
        $tipo = 'sm';
    } elseif ($campos <= 0) {
        $mesaje = 'no tiene nada';
    } ?>
    <div class="modal fade bd-example-modal-<?php echo $tipo ?>" tabindex="-100" role="dialog"  id="<?php echo $id ?>"  aria-hidden="true">
        <div class="modal-dialog modal-<?php echo $tipo ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">titulo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="">

                        <?php if ($tipo == 'sm') {
                                foreach ($campos as $key ) { ?>
                                <div class="position-relative form-group"><label for="exampleAddress" class=""><?php echo $key ?></label><input name="address" id="<?php echo $key?>" name="<?php echo $key?>" placeholder="1234 Main St" type="text" class="form-control"></div>


                        <?php
                                }
                            } ?>
                        <button class="mt-2 btn btn-primary">Sign in</button>
                    </form>

                </div>
                
            </div>
        </div>
    </div>
<?php
} else {
    echo 'no me as mandado mada';
}

?>