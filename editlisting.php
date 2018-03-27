<div class='spacing'>
    <label>Title</label>
    <input type='text' id='title' required>
</div>
<div class='spacing'>
    <label>Price</label>
    <input type='text' name='price' id="price" onchange="checkPrice()" value="$" required>
</div>
<div class='spacing'>
    <label>Description</label>
    <textarea id='description' style="width: 100%; height: 200px"></textarea>
</div>
<div class="modal-footer">
  <button onclick="updatelisting('<?php echo $_GET['id']; ?>')" class="btn btn-success btn-md" style='width:25%;' name='save'>SAVE</button>
</div>
