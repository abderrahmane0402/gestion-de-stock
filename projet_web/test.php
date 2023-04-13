<head>
</head>
<form action="" method="post">
  <input type="text" name="n[]" value="1" disabled/><input type="text" name="n[]" /><input
    type="text"
    name="n[]"
  />
  <div class="form-group">
  <label for="produits">Produits</label>
                                            <select multiple class="selectpicker" data-live-search="true" name="produits[]">
                                                <option>Apples</option>
                                                <option>Boys</option>
                                                <option>Cats</option>
                                            </select>
                                            </div>
  <input type="submit" name="submit" id="el" />
</form>
<?php
if(isset($_POST['submit'])){
  extract($_POST);
  $key = 1;
  foreach ($produits as $key => $value) {
    echo $value."ss";
  }
}
?>
