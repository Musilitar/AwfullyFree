<form class="pure-form" action="newProduct.php" method="post" enctype="multipart/form-data">
    <fieldset class="pure-group">
        <input class="pure-input" type="text" name="name" placeholder="Name"/>
        <input class="pure-input" type="text" name="price_without_taxes" placeholder="Price (without taxes)"/>
    </fieldset>
    <fieldset class="pure-group">
        <input class="pure-input" type="file" name="file" id="file">
    </fieldset>
    <button id="submitButton" type="submit" class="pure-button pure-button-primary">Add</button>
    <button id="cancelButton" type="button" class="pure-button pure-button-primary">Cancel</button>
</form>

<button id="addButton" class="pure-button pure-button-primary">Add product</button>