
<?php

$itemdetail = $data;

?>
<div class="space"></div>
<div class="btn-group" >
<a href="index.php" class="btn btn-success">Back</a>
<!-- <a href="#editModal" role="button" class="btn btn-success" data-toggle="modal">Edit</a> -->
<a href="item_edit.php?itemupdate=<?php echo $itemdetail; ?>" role="button" class="btn btn-success" data-toggle="modal">Edit</a>
<a href="#deleteModal" role="button" class="btn btn-success" data-toggle="modal">Delete</a>
</div>


<div id="deleteModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 class="ModalLabel">Delete This Item?</h3>
  </div>
  <div class="modal-body">
    <p>Danger Danger! You are about to permanently delete an item from the database. Beyond this is the point of no return.</p>
  </div>
  <div class="modal-footer">
    <button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true">Cancel</button>
    <a href="item_edit.php?delete=<?php echo $itemdetail; ?>" class="btn btn-danger">Delete Item</a>
  </div>
</div>




<div id="editModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 class="ModalLabel">Edit This Item?</h3>
  </div>
  <div class="modal-body">
    <?php 

      //print_r($itemdetail);


    ?>
    <form>
  <fieldset>
    <legend><?php echo $itemdetail; ?></legend>
    <label>Label name</label>
    <input type="text" placeholder="Type something…">
    <span class="help-block">Example block-level help text here.</span>
    <label class="checkbox">
      <input type="checkbox"> Check me out
    </label>
  </fieldset>
</form>
  </div>
  <div class="modal-footer">
    <button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true">Cancel</button>
    <a href="item_edit.php?edit=<?php echo $itemdetail; ?>" class="btn btn-info">Submit</a>
  </div>
</div>




